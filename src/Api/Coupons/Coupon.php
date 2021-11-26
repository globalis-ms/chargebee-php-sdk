<?php

namespace Globalis\Chargebee\Api\Coupons;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class Coupon extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $url = $this->url('coupons');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
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
     * @throws Exception
     *
     * @return array|string
     */
    public function createForItems(array $data, array $headers = [])
    {
        $url = $this->url('coupons/create_for_items');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function updateForItems(string $id, array $data, array $headers = [])
    {
        $url = $this->url('coupons/%s/update_for_items', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
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
     * @throws Exception
     *
     * @return array|string
     */
    public function unarchive($id, array $headers = [])
    {
        $url = $this->url('coupons/%s/unarchive', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function copy(array $data, array $headers = [])
    {
        $url = $this->url('coupons/copy');

        return $this->post($url, $data, $headers);
    }
}
