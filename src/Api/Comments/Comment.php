<?php

namespace NathanDunn\Chargebee\Api\Comments;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Comment extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('comments');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('comments/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('comments');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id)
    {
        $url = $this->url('comments/%s', $id);

        return $this->post($url, []);
    }
}