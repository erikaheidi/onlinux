<?php

namespace App\LiquidTag;

use Librarian\Content;
use Librarian\Exception\ContentNotFoundException;
use Parsed\ContentParser;
use Parsed\CustomTagParserInterface;

class Guide extends Embed
{
    public function getContentType(): string
    {
        return 'guides';
    }
}