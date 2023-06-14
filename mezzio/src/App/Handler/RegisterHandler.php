<?php
declare(strict_types=1);

namespace App\Handler;

use App\Form\RegisterForm;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RegisterHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;
    private RegisterForm $registerForm;

    public function __construct(TemplateRendererInterface $templateRenderer, RegisterForm $registerForm)
    {
        $this->templateRenderer = $templateRenderer;

        $this->registerForm = $registerForm;
    }

    public function Handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === 'GET') {
            return new HtmlResponse($this->templateRenderer->render(
                'app::register',
                ['RegisterForm' => $this->registerForm->getMessages()])
            );
        }

        $this->registerForm->setData($request->getParsedBody());
        $isValid = $this->registerForm->isValid();

        if ($isValid === true) {
            return new RedirectResponse('/loggedInUser');
        }
        return new RedirectResponse('/notloggedInUser');

    }
}