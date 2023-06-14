<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactHandler implements RequestHandlerInterface
{
    public const PI = 3.14;

    /** @var null|TemplateRendererInterface */
    private $template;

    public function __construct(?TemplateRendererInterface $template = null)
    {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $name2 = $request->getQueryParams()['name2'] ?? ''; // $_GET, Filter, Sanitize

        return new HtmlResponse(
            $this->template->render('app::contact-page'));

    }
}
