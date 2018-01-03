<?php

namespace NathanDunn\Chargebee\Api\Addons;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Addon extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('addons');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('addons/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('addons');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function update(string $id, $data = [])
    {
        $url = $this->url('addons/%s', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id)
    {
        $url = $this->url('addons/%s/delete', $id);

        return $this->post($url, []);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function copy(array $data)
    {
        $url = $this->url('addons/copy');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function unarchive(string $id)
    {
        $url = $this->url('addons/%s/unarchive', $id);

        return $this->post($url, []);
    }
}