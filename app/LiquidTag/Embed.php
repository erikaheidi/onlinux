<?php

namespace App\LiquidTag;

use Librarian\Content;
use Librarian\Exception\ContentNotFoundException;
use Parsed\ContentParser;
use Parsed\CustomTagParserInterface;

class Embed implements CustomTagParserInterface
{

    public function getContentType(): string
    {
        return 'blog';
    }

    public function parse($tag_value, array $params = []): ?string
    {
        $path = __DIR__ . '/../Resources/data/'. $this->getContentType() . '/' . $tag_value . '.md';
        $content = new Content();
        try {
            $content->load($path);
            $parser = new ContentParser();
            $article = $parser->parse($content);

            return $this->getEmbed($article);
        } catch (ContentNotFoundException $e) {
            return null;
        }
    }

    public function getEmbed(Content $content): string
    {
        return '<div class="grid grid-cols-4 gap-4 border">
            <div class="p-4">
                  <a href="/'. $this->getContentType() .'/'. $content->getSlug() .'" title="Check the overview of '. $content->getAlternateTitle() .'">' .
            '<img src="'. $content->frontMatterGet('cover_image') .'" class="w-1/3 rounded object-left" alt="Thumbnail">  
                  </a>           
            </div>
            <div class="col-span-2">
                  <h4><a href="/' . $this->getContentType() . '/'. $content->getSlug() .'" title="Check the overview of '. $content->frontMatterGet('title') .'">' . $content->frontMatterGet('title') . '</a></h4>
                  <p class="text-sm">'. $content->frontMatterGet('description') .'</p>
            </div>
        </div>';
    }
}