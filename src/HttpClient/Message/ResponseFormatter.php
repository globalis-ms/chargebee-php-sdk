<?php

namespace Globalis\Chargebee\HttpClient\Message;

use Psr\Http\Message\ResponseInterface;

class ResponseFormatter
{
    /**
     * Return the response body as a string or json array if content type is application/json.
     *.
     *
     * @param ResponseInterface $response
     *
     * @return array|string
     */
    public static function getContent(ResponseInterface $response)
    {
        $body = $response->getBody()->__toString();

        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            $content = json_decode($body, true);
            if (JSON_ERROR_NONE === json_last_error()) {
                return $content;
            }
        }

        return $body;
    }
}
