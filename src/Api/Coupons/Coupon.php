<?php

namespace NathanDunn\Chargebee\Api\Coupons;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Coupon extends AbstractApi
{
    /**
     * @param array $parameters
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('coupons');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id)
    {
        $url = $this->url('coupons/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data)
    {
        $url = $this->url('coupons');

        return $this->post($url, $data);
    }

    /**
     * @param $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id)
    {
        $url = $this->url('coupons/%s/delete', $id);

        return $this->post($url, []);
    }

    /**
     * @param $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function unarchive($id)
    {
        $url = $this->url('coupons/%s/unarchive', $id);

        return $this->post($url, []);
    }
}
