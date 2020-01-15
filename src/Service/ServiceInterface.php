<?php

namespace App\Service;

use App\Utils\Book;

interface ServiceInterface
{
    public function getBooks():Book;
}