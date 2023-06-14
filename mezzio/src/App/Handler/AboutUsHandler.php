<?php
declare(strict_types=1);

namespace App\Handler;


use App\Form\AboutUsForm;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;

class AboutUsHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;
    private AboutUsForm $aboutUsForm;

    /**
     * @param TemplateRendererInterface $templateRenderer
     * @param AboutUsForm $aboutUsForm
     */
    public function __construct(TemplateRendererInterface $templateRenderer, AboutUsForm $aboutUsForm)
    {
        $this->templateRenderer = $templateRenderer;
        $this->aboutUsForm = $aboutUsForm;
    }

    public function Handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === 'GET') {
            return new HtmlResponse(
                $this->templateRenderer->render('app::aboutus',
                    ['AboutUs' => $this->aboutUsForm->getMessages()]
                )
            );
        }
        $this->aboutUsForm->SetData($request->getParsedBody());
        $isValid = $this->aboutUsForm->isValid();
        //  var_dump($isValid);
        // var_dump($this->aboutUsForm->getMessages());die;
        if ($isValid === true) {
            return new RedirectResponse('/loginuser');

        }
        return new RedirectResponse('/lognotuser');

    }
}