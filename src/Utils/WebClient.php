<?php

namespace App\Utils;

use Symfony\Component\HttpClient\HttpClient;

class WebClient implements WebClientInterface
{
    private $_url;
    private $_response;

     /**
     * Numeric status code, 200: OK
     */
    const HTTP_OK = 200;

    /**
     * Numeric status code, 201: Created
     */
    const HTTP_CREATED = 201;

    /**
     * Numeric status code, 500: Internal error
     */
    const HTTP_INTERNAL_ERROR = 500;

    /**
     * Numeric status code, 400: Bad Request
     */
    const HTTP_BAD_REQUEST = 400;

    /**
     * Numeric status code, 404: Not found
     */
    const HTTP_NOT_FOUND = 404;

    /**
     * Numeric status code, 304: Not modified
     */
    const HTTP_NOT_MODIFIED = 304;

    /**
     * Numeric status code, 301 Moved permanently
     */
    const HTTP_MOVED_PERM = 301;

    /**
     * Numeric status code, 302 Moved Temporarily
     */
    const HTTP_MOVED_TEMP = 302;

    /**
     * Is the response code a 200 OK?
     *
     * @return true if 200, false otherwise
     */
    public function ok()
    {
        return self::HTTP_OK == $this->code();
    }

     /**
     * Get the status code of the response
     *
     * @return integer
     */
    public function code()
    {
        return (integer) $this->_response->getStatusCode();
    }

    /**
     * URL escaping
     *
     * @param string url
     *
     * @return string
     */
    private function escapeUrl($url):string {
        return str_replace(' ', '%20', $url);
    }

    public function setUrl($url) {
        $this->_url = $this->escapeUrl($url);
    }

    /**
     * Get the {@link URL} of this request's connection
     *
     * @return string request URL
     */
    public function url():string
    {
        return $this->_url;
    }

    public function get():string
    {
        $client = HttpClient::create();
        $this->_response = $client->request('GET', $this->_url);

        if ($this->ok()) {
            return $this->_response->getContent();
        }

        return "";
    }

}