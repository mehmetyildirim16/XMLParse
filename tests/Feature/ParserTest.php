<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function application_parses_the_first_xml_feed_without_cdata()
    {
        $url = "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_5.xml";
        $node = "job";
        $response = $this->post('/api', [
            'url' => $url,
            'node' => $node
        ])->assertStatus(200);
        // the response has exactly 13 parameters
        $response->assertJsonCount(13);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function application_show_error_message_when_url_is_not_valid()
    {
        $url = "https://appjobs-general.s3.eu-west-1.amazonaws.com/test-xml-feeds/feed_99.xml";
        $node = "job";
        $response = $this->post('/api', [
            'url' => $url,
            'node' => $node
        ])->assertStatus(400);
        self::assertEquals('failed', $response->json()['status']);
    }
}
