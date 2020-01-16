<?php

namespace App\Service;

use App\Utils\Book;
use App\Utils\BookSetting;
use App\Utils\WebClientInterface;


class GoogleService implements ServiceInterface
{
    public $webclient;

    public function __construct(WebClientInterface $webclient)
    {
        $this->webclient = $webclient;
    }

    public function getBooks():Book
    {
        $data =  $this->webclient->get();

        $mapper = new \JsonMapper();
        $mapper->undefinedPropertyHandler = 'App\Utils\BookSetting::setUndefinedProperty';
        $mapper->bExceptionOnMissingData = false;

        $books = $mapper->map(json_decode($data), new Book());

        return $books;
    }


}