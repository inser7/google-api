<?php


namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\WebClient;

class WebClientTest extends TestCase
{
    public function testGet()
    {
        $webclient = new WebClient();
        $webclient ->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
        $response = $webclient->get();

        $this->assertTrue(isset(json_decode($response)->items));
        $this->assertIsString($response);


    }
}