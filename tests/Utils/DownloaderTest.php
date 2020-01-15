<?php


namespace App\Tests\Utils;

use PHPUnit\Framework\TestCase;
use App\Utils\Downloader;

class DownloaderTest extends TestCase
{
    private $downloader;

    protected function setUp()
    {
        $this->downloader = new Downloader();
        $this->downloader->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
    }


    public function testGet()
    {
        $downloader = new Downloader();
        $downloader->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
        $result = $this->downloader->get();

        $this->assertIsString($result);
        $this->assertJson($result);

    }
}