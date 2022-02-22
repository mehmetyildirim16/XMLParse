<?php

namespace App\Domains\Reader\Context;

use App\Domains\Reader\Data\TheFirstFeed;

class XmlReader
{
    public function read(string $url, string $node): TheFirstFeed
    {
        $reader = new \XMLReader();
        $reader->open($url);
        //loop through the feed until we find the related tag
        while ($reader->read() && $reader->name !== $node ){}
        $node = new \SimpleXMLElement($reader->readOuterXML(), LIBXML_NOCDATA);
        $reader->close();
        $xml = simplexml_load_string($node->asXML(), 'SimpleXMLElement', LIBXML_NOCDATA);
        //return the first feed
        return new TheFirstFeed($xml);
    }
}
