<?php

declare(strict_types=1);

namespace App\Handler;

use App\Form\LoginForm;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class LoginEhsanSubmitHandlerFactory
{
    public function __invoke(ContainerInterface $container): LoginEhsanSubmitHandler
    {
        return new LoginEhsanSubmitHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(LoginForm::class)
        );
    }
}