<?php

namespace App\Command\Web;

use Librarian\Provider\TwigServiceProvider;
use Librarian\Request;
use Librarian\WebController;
use Librarian\Response;
use Librarian\Provider\ContentServiceProvider;

class IndexController extends WebController
{
    public function handle(): int
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
        $featured = $content_provider->fetchFrom("guides", 0, 1);
        $content_guides = $content_provider->fetchFrom("guides", 1, 4);
        $content_setups = $content_provider->fetchFrom("desksetup", 0, 1);
        $content_devices = $content_provider->fetchFrom("devices", 0, 3, false, 'rand');

        $output = $twig->render('content/index.html.twig', [
            'content_guides'  => $content_guides,
            'content_setups'  => $content_setups,
            'content_devices'  => $content_devices,
            'featured' => $featured,
        ]);

        $response = new Response($output);

        $response->output();
        return 0;
    }
}
