<?php

namespace Globalis\Chargebee\Api\CouponCodes;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class CouponCode extends AbstractApi
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
        $url = $this->url('coupon_codes');

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
        $url = $this->url('coupon_codes/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function archive(string $id, array $headers = [])
    {
        $url = $this->url('coupon_codes/%s/archive', $id);

        return $this->post($url, [], $headers);
    }
}
