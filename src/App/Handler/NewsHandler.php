<?php

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewsHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;

    public function __construct(TemplateRendererInterface $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $news = [
            'news1' => [
                'info' => [
                    'title' => 'shopping to harvest the crop ',
                    'body' => 'machine cnc argiculture'
                ],
                'author' => [
                    'name' => 'Alireza',
                    'family' => 'Yaghobi'
                ]
            ],
            'news2' => [
                'info' => [
                    'title' => 'shopping',
                    'body' => 'wood cutting machine'
                ],
                'author' => [
                    'name' => 'Javad',
                    'family' => 'Yaghobi'
                ]
            ],
        ];


        return new HtmlResponse($this->templateRenderer->render('app::news-page', ['newses' => $news]));
    }
}
