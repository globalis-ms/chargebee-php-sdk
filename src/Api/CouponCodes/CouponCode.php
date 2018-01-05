<?php

namespace NathanDunn\Chargebee\Api\CouponCodes;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CouponCode extends AbstractApi
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

        $url = $this->url('coupon_codes');

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
        $url = $this->url('coupon_codes/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function archive(string $id)
    {
        $url = $this->url('coupon_codes/%s/archive', $id);

        return $this->post($url, []);
    }
}
