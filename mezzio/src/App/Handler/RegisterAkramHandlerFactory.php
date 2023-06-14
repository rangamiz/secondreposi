
<?php
    namespace APP\Handler;
    use Psr\Container\ContainerInterface;

    class  RegisterAkramHandlerFactory
    {
      public function __invoke(ContainerInterface $container):RegisterAkramHandler
      {
          return new RegisterAkramHandler(
          $container->get(TemplateRendererInterface::class);
          $container->get(RegisterForm::class);
      )
    }
    }