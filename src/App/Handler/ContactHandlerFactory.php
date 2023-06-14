<?php

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class ContactHandlerFactory
{
    public function __invoke(ContainerInterface $container): ContactHandler
    {
        $template = $container->get(TemplateRendererInterface::class);
        return new ContactHandler($template);
    }

}