<?php

namespace NathanDunn\Chargebee\Api\Addresses;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Address extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(array $parameters = [], array $headers = [])
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined('subscription_id')
            ->setAllowedTypes('subscription_id', 'string')
            ->setRequired('subscription_id');

        $resolver->setDefined('label')
            ->setAllowedTypes('label', 'string')
            ->setRequired('label');

        $url = $this->url('addresses');

        return $this->get($url, $resolver->resolve($parameters), $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(array $data, array $headers = [])
    {
        $url = $this->url('addresses');

        return $this->post($url, $data, $headers);
    }
}
