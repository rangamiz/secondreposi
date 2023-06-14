<?php
declare(strict_types=1);
namespace APP\Handler;

use App\Form\RegisterForm;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;use Whoops\Handler\Handler;

class RegisterAkramHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;
    private registerForm $registerForm;


    public function __construct(TemplateRendererInterface $templateRenderer, registerForm $registerForm)
    {
        $this->registerForm = $registerForm;
        $this->templateRenderer = $templateRenderer;
    }

    public function Handle(ServerRequestInterface $request)
    {
        return new HtmlResponse(
            $this->templateRenderer->render('app::RegisterForm',
                ['RegisterForm' => $this->registerForm->getmassage('good')]
            )
        );
    }
}






