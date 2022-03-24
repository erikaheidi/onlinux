<?php

namespace App\LiquidTag;

use Librarian\Content;
use Librarian\Exception\ContentNotFoundException;
use Parsed\CustomTagParserInterface;

class Device implements CustomTagParserInterface
{

    public function parse($tag_value, array $params = [])
    {
        // TODO: Implement parse() method.

        $path = __DIR__ . '/../Resources/data/devices/'. $tag_value . '.md';
        $content = new Content();
        try {
            $content->load($path);
            return $this->getEmbed($content);
        } catch (ContentNotFoundException $e) {
            return null;
        }
    }

    public function getEmbed(Content $content)
    {
        return '<div class="bg-gray-100 p-4">
            <a href="">' . $content->getAlternateTitle() . '</a>
        </div>';
    }
}