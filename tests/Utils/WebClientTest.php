<?php


namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\WebClient;

class WebClientTest extends TestCase
{
    private $webclient;

    protected function setUp()
    {
        $this->webclient = new WebClient();
        $this->webclient->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
    }


    public function testGet()
    {
        $this->webclient ->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
        $result = $this->downloader->get();

        $this->assertIsString($result);
        $this->assertJson($result);

    }
}