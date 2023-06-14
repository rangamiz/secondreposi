<?php

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ShoppingHandler implements RequestHandlerInterface
{
    private $templateRenderer;

    public function __construct(TemplateRendererInterface $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // DB, API
        $products = [
            [
                'title' => 'title of news1',
                'body' => 'body of news'
            ],

        ];

        return new HtmlResponse(
            $this->templateRenderer->render(
                'app::shopping-page',
                ['products' => $products]
            )
        );
    }
}