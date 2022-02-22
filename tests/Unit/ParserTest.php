<?php

namespace Tests\Unit;

use App\Domains\Parser\Context\Xml2ArrayParser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     */
    public function clears_out_CdataFromArray():void
    {
        $xml = '<![CDATA[<p>This is a CDATA section.</p>]]>';
        $json = json_encode($xml);
        $array[0] = json_decode($json,TRUE);
        $parser = new Xml2ArrayParser();
        $result = $parser->clearCdata($array);
        self::assertEquals('<p>This is a CDATA section.</p>',$result[0]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     */
    public function parses_xml_to_array(){
        $xml = '<![CDATA[<p>This is a CDATA section.</p>]]>';
        $json = json_encode($xml);
        $array[0] = json_decode($json,TRUE);
        $parser = new Xml2ArrayParser();
        $result = $parser->parse($array);
        self::assertEquals('<p>This is a CDATA section.</p>',$result->data[0]);
    }
}
