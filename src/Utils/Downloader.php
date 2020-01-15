<?php

namespace App\Utils;

use Symfony\Component\HttpClient\HttpClient;

class Downloader implements DownloaderInterface
{
    private $url;

    /**
     * URL escaping
     *
     * @param string url
     *
     * @return string
     */
    private function escapeUrl($url) {
        return str_replace(' ', '%20', $url);
    }

    public function setUrl($url) {
        $this->url = $this->escapeUrl($url);
    }

    public function get()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $this->url);

        return $response->getContent();
    }

}