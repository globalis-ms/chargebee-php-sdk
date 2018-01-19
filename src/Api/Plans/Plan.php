<?php

namespace NathanDunn\Chargebee\Api\Plans;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Plan extends AbstractApi
{
    /**
     * Get subscriptions.
     *
     * @param array $parameters
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('plans');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('plans');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('plans/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(string $id, array $data, array $headers = [])
    {
        $url = $this->url('plans/%s', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('plans/%s/delete', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param array $data
     *
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function copy(array $data, array $headers = [])
    {
        $url = $this->url('plans/copy');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function unarchive(string $id, array $headers = [])
    {
        $url = $this->url('plans/%s/unarchive', $id);

        return $this->post($url, [], $headers);
    }
}
