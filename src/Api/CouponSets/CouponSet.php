<?php

namespace NathanDunn\Chargebee\Api\CouponSets;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CouponSet extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('coupon_sets');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('coupon_sets/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('coupon_sets');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function addCouponCodes(string $id, array $data)
    {
        $url = $this->url('coupon_sets/%s/add_coupon_codes', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function update(string $id, array $data)
    {
        $url = $this->url('coupon_sets/%s/update', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id)
    {
        $url = $this->url('coupon_sets/%s/delete', $id);

        return $this->post($url, []);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function deleteUnusedCouponCodes(string $id)
    {
        $url = $this->url('coupon_sets/%s/delete_unused_coupon_codes', $id);

        return $this->post($url, []);
    }
}