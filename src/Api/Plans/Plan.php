<?php

namespace NathanDunn\Chargebee\Api\Plans;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Plan extends AbstractApi
{
    /**
     * Get subscriptions
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('plans');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('plans');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('plans/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function update(string $id, array $data)
    {
        $url = $this->url('plans/%s', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $data)
    {
        $url = $this->url('plans/%s/delete', $id);

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function copy(array $data)
    {
        $url = $this->url('plans/copy');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function unarchive(string $id)
    {
        $url = $this->url('plans/%s/unarchive', $id);

        return $this->post($url, []);
    }
}