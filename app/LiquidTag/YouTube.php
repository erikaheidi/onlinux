<?php


namespace App\LiquidTag;


use Parsed\CustomTagParserInterface;

class YouTube implements CustomTagParserInterface
{

    public function parse($tag_value, array $params = [])
    {
        return $this->getEmbed($tag_value);
    }

    public function getEmbed($video_id)
    {
        return '<div class="aspect-w-16 aspect-h-9">
            <iframe src="https://www.youtube.com/embed/'. $video_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>';
    }
}