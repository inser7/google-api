<?php

namespace App\Service;

use App\Utils\Book;
use App\Utils\BookSetting;
use App\Utils\DownloaderInterface;


class GoogleService implements ServiceInterface
{
    public $downloader;

    public function __construct(DownloaderInterface $downloader)
    {
        $this->downloader = $downloader;
    }

    public function getData()
    {
        $data =  $this->downloader->get();

        $mapper = new \JsonMapper();
        $mapper->undefinedPropertyHandler = 'App\Utils\BookSetting::setUndefinedProperty';
        $mapper->bExceptionOnMissingData = false;

        $books = $mapper->map(json_decode($data), new Book());

        return $books;
    }


}