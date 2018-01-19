<?php

namespace NathanDunn\Chargebee\Api\Coupons;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Coupon extends AbstractApi
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

        $url = $this->url('coupons');

        return $this->get($url, $resolver->resolve($parameters), $headers);
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
        $url = $this->url('coupons/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('coupons');

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
        $url = $this->url('coupons/%s/delete', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function unarchive($id, array $headers = [])
    {
        $url = $this->url('coupons/%s/unarchive', $id);

        return $this->post($url, [], $headers);
    }
}
