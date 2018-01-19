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
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('comments');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('comments/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     *
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('comments');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('comments/%s', $id);

        return $this->post($url, [], $headers);
    }
}
