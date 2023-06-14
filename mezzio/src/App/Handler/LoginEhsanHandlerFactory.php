<?php

declare(strict_types=1);

namespace App\Handler;

use App\Form\LoginForm;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class LoginEhsanHandlerFactory
{
    public function __invoke(ContainerInterface $container): LoginEhsanHandler
    {
        return new LoginEhsanHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(LoginForm::class)
        );
    }
}