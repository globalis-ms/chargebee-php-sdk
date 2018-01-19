<?php

namespace NathanDunn\Chargebee\Api\Addons;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Addon extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('addons');

        return $this->get($url, $resolver->resolve($parameters), $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('addons/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('addons');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function update(string $id, array $data = [], array $headers = [])
    {
        $url = $this->url('addons/%s', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('addons/%s/delete', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function copy(array $data, array $headers = [])
    {
        $url = $this->url('addons/copy');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     *
     * @throws Exception
     */
    public function unarchive(string $id, array $headers = [])
    {
        $url = $this->url('addons/%s/unarchive', $id);

        return $this->post($url, [], $headers);
    }
}
