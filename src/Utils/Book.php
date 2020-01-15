<?php

namespace App\Utils;

class Book
{
    /**
     * Total items
     *
     * @var integer
     * @required
     */
    public $totalItems;

    /**
     * Books
     *
     * @var Book[]
     * @required
     */
    public $items = array();

}
