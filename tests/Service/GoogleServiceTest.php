<?php


namespace App\Tests\Service;

use App\Service\GoogleService;
use App\Utils\Book;
use App\Utils\Downloader;
use App\Utils\DownloaderInterface;
use PHPUnit\Framework\TestCase;


class GoogleServiceTest extends TestCase
{
    private $downloader;

    protected function setUp()
    {
        $this->downloader = new Downloader();
        $this->downloader->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
    }

    public function testGetBooks()
    {
        $googleService = new googleService($this->downloader);

        $result = $googleService->getBooks();

        $this->assertInstanceOf("App\Utils\Book",$result);
    }
}