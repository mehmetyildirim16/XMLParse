<?php

namespace Tests\Unit;

use App\Domains\Reader\Context\XmlReader;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

class ReaderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @test
     */
    public function reads_and_returns_the_first_xml()
    {
        $url = "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_5.xml";
        $node = "job";
        $reader = new XmlReader();
        $xmlData = $reader->read($url, $node);
        $this->assertNotEquals($xmlData, null);
        self::assertInstanceOf(\SimpleXMLElement::class, $xmlData->xml);
        assertEquals(13, $xmlData->xml->count());
    }
}
