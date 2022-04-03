<?php

namespace App\LiquidTag;


class Device extends Embed
{
    public function getContentType(): string
    {
        return 'devices';
    }
}