<?php

declare(strict_types=1);

namespace App;

use App\Handler\AboutUsHandlerFactory;
use App\Form\AboutUsForm;
use App\Form\LoginForm;
use App\Form\RegisterForm;
use App\Handler\AboutUsHandler;
use App\Handler\ContactHandler;
use App\Handler\ContactHandlerFactory;
use App\Handler\HomePageHandler;
use App\Handler\HomePageHandlerFactory;
use App\Handler\LoginEhsanHandler;
use App\Handler\LoginEhsanHandlerFactory;
use App\Handler\LoginEhsanSubmitHandler;
use App\Handler\LoginEhsanSubmitHandlerFactory;
use App\Handler\NewsHandler;
use App\Handler\NewsHandlerFactory;
use App\Handler\PingHandler;
use App\Handler\RegisterAkramHandler;
use App\Handler\RegisterAkramHandlerFactory;
use App\Handler\RegisterHandler;
use App\Handler\RegisterHandlerFactory;
use App\Handler\ShoppingHandler;
use App\Handler\ShoppingHandlerFactory;
use Whoops\Handler\Handler;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
                PingHandler::class => PingHandler::class,
                LoginForm::class => LoginForm::class,
                RegisterForm::class => RegisterForm::class,
                AboutUsForm::class => AboutUsForm::class,
            ],
            'factories' => [
                HomePageHandler::class => HomePageHandlerFactory::class,
                ContactHandler::class => ContactHandlerFactory::class,
                ShoppingHandler::class => ShoppingHandlerFactory::class,
                NewsHandler::class => NewsHandlerFactory::class,
                LoginEhsanHandler::class => LoginEhsanHandlerFactory::class,
                LoginEhsanSubmitHandler::class => LoginEhsanSubmitHandlerFactory::class,
                RegisterAkramHandler::class => RegisterAkramHandlerFactory::class,
                RegisterHandler::class => RegisterHandlerFactory::class,
                AboutUsHandler::class => AboutUsHandlerFactory:: class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app' => ['templates/app'],
                'error' => ['templates/error'],
                'layout' => ['templates/layout'],
            ],
        ];
    }
}
