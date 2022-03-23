<?php

namespace App\Command\Web;

use Librarian\Provider\TwigServiceProvider;
use Librarian\Request;
use Librarian\WebController;
use Librarian\Response;
use Librarian\Provider\ContentServiceProvider;

class IndexController extends WebController
{
    public function handle()
    {
        /** @var TwigServiceProvider $twig */
        $twig = $this->getApp()->twig;
        /** @var ContentServiceProvider $content_provider */
        $content_provider = $this->getApp()->content;
        $request = $this->getRequest();

        if ($this->getApp()->config->site_index !== null) {
            $content = $content_provider->fetch($this->getApp()->config->site_index);
            if ($content) {
                $response = new Response($twig->render('content/single.html.twig', [
                    'content' => $content
                ]));

                $response->output();
                return 0;
            }
        }

        // get latest from each content type.
        $content_guides = $content_provider->fetchFrom("guides", 0, 4);
        $content_setups = $content_provider->fetchFrom("desksetup", 0, 1);

        $output = $twig->render('content/index.html.twig', [
            'content_guides'  => $content_guides,
            'content_setups'  => $content_setups,
        ]);

        $response = new Response($output);

        $response->output();
        return 0;
    }
}
