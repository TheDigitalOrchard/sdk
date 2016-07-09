<?php

namespace PhpWatson\Sdk\Tests\Language\RetrieveAndRank\V1;

use PhpWatson\Sdk\Tests\AbstractTestCase;
use PhpWatson\Sdk\Language\ToneAnalyser\ToneAnalyserService;

class ToneAnalyserV3Test extends AbstractTestCase
{
    /**
     * @var ToneAnalyserService
     */
    public $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new ToneAnalyserService();
    }

    public function test_if_url_is_set()
    {
        $this->assertEquals(
            'https://watson-api-explorer.mybluemix.net/tone-analyzer/api',
            $this->service->getUrl()
        );
    }

    public function test_if_version_is_set()
    {
        $this->assertEquals(
            'v3',
            $this->service->getVersion()
        );
    }

    public function test_can_analyse_plain_text()
    {
        $response = $this->service->plainText('Example text to analyse, duuh!');

        $this->assertArrayHasKey('document_tone', json_decode($response->getBody()->getContents(), true));
    }
}