<?php

declare(strict_types=1);

namespace App\Handler;

use App\Form\LoginForm;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginEhsanSubmitHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;
    private LoginForm $loginForm;

    public function __construct(TemplateRendererInterface $templateRenderer, LoginForm $loginForm)
    {
        $this->templateRenderer = $templateRenderer;
        $this->loginForm = $loginForm;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->loginForm->setData($request->getParsedBody());
        $isValid = $this->loginForm->isValid();

        if ($isValid) {
            return new RedirectResponse(); // Go to user panel
        }

        return new RedirectResponse(); // Go to Login page
    }
}