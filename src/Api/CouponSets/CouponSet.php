<?php

namespace NathanDunn\Chargebee\Api\CouponSets;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CouponSet extends AbstractApi
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

        $url = $this->url('coupon_sets');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id)
    {
        $url = $this->url('coupon_sets/%s', $id);

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
        $url = $this->url('coupon_sets');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function addCouponCodes(string $id, array $data)
    {
        $url = $this->url('coupon_sets/%s/add_coupon_codes', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(string $id, array $data)
    {
        $url = $this->url('coupon_sets/%s/update', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id)
    {
        $url = $this->url('coupon_sets/%s/delete', $id);

        return $this->post($url, []);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function deleteUnusedCouponCodes(string $id)
    {
        $url = $this->url('coupon_sets/%s/delete_unused_coupon_codes', $id);

        return $this->post($url, []);
    }
}
