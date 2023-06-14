<?php

namespace App\Handler;

use http\Env\Response;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
class NewsHandlerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new newsHandler(
            $container->get(TemplateRendererInterface::class)
        );
        // TODO: Implement __invoke() method.
    }
}
