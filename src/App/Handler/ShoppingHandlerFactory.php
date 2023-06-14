<?php

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class ShoppingHandlerFactory
{
    public function __invoke(ContainerInterface $container): ShoppingHandler
    {
        return new ShoppingHandler(
            $container->get(TemplateRendererInterface::class)
        );
    }
}