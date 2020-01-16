<?php


namespace App\Tests\Service;

use App\Service\GoogleService;
use App\Utils\Book;
use App\Utils\Downloader;
use App\Utils\WebClient;
use App\Utils\WebClientInterface;
use PHPUnit\Framework\TestCase;


class GoogleServiceTest extends TestCase
{
    private $client;

    protected function setUp()
    {
        $this->client = new WebClient();
        $this->client->setUrl('https://www.googleapis.com/books/v1/volumes?q=test&startIndex=10');
    }

    public function testGetBooks()
    {
        $googleService = new googleService($this->client);

        $result = $googleService->getBooks();

        $this->assertInstanceOf("App\Utils\Book",$result);
    }
}