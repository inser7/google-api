<?php

namespace App\Utils;

class BookSetting
{
    /**
     * Book id
     *
     * @var string
     * @required
     */
    public $id;

    // TODO: map here with class-to-attribute mechanism
    public static function setUndefinedProperty($object, $propName, $jsonValue)
    {
        if ($propName === 'volumeInfo') {
            $object->title = $jsonValue->title;

            if (isset($jsonValue->authors)) {
                $object->authors = $jsonValue->authors;
            } else {
                $object->authors = [];
            }

            if (isset($jsonValue->publisher)) {
                $object->publisher = $jsonValue->publisher;
            } else {
                $object->publisher = null;
            }

            if (isset($jsonValue->publishedDate)) {
                $object->publishedDate = $jsonValue->publishedDate;
            } else {
                $object->publishedDate = null;
            }

            if (isset($jsonValue->imageLinks)) {
                $object->image = $jsonValue->imageLinks->thumbnail;
            } else {
                $object->image = null;
            }
        }

        if ($propName === 'saleInfo') {
            if (isset($jsonValue->buyLink)) {
                $object->buyLink = $jsonValue->buyLink;
            } else {
                $object->buyLink = null;
            }
        }
    }
}
