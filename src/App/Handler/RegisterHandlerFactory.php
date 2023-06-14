<?php

namespace App\Handler;

use App\Form\RegisterForm;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class RegisterHandlerFactory
{
    public function __invoke(containerInterface $container): RegisterHandler
    {
        return new RegisterHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(RegisterForm::class)
        );
    }
}


