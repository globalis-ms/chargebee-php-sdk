<?php

namespace NathanDunn\Chargebee\Api\Comments;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Comment extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $url = $this->url('comments');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param string $id
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $parameters = [], array $headers = [])
    {
        $url = $this->url('comments/%s', $id);

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('comments');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('comments/%s', $id);

        return $this->post($url, [], $headers);
    }
}
