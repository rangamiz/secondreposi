<?php
declare(strict_types=1);
namespace App\Handler;

use App\Form\AboutUsForm;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class AboutUsHandlerFactory
{
    public function __invoke(ContainerInterface $container): AboutUsHandler
    {
        return new AboutUsHandler(
            $container->get(TemplateRendererInterface::class),
            $container->get(AboutUsForm::class)
        );
    }
}