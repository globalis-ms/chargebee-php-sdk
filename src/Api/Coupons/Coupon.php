<?php

namespace NathanDunn\Chargebee\Api\Coupons;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Coupon extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('coupons');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('coupons/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('coupons');

        return $this->post($url, $data);
    }

    /**
     * @param $id
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id)
    {
        $url = $this->url('coupons/%s/delete', $id);

        return $this->post($url, []);
    }

    /**
     * @param $id
     * @return array|string
     * @throws Exception
     */
    public function unarchive($id)
    {
        $url = $this->url('coupons/%s/unarchive', $id);

        return $this->post($url, []);
    }
}