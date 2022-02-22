<?php

namespace App\Domains\Reader\Data;

class TheFirstFeed
{
    public function __construct(public \SimpleXMLElement $xml){}
}
