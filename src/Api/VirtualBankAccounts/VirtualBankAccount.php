<?php

namespace NathanDunn\Chargebee\Api\VirtualBankAccounts;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class VirtualBankAccount extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $url = $this->url('virtual_bank_accounts');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('virtual_bank_accounts');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function createWithPermanentToken(array $data, array $headers = [])
    {
        $url = $this->url('virtual_bank_accounts/create_using_permanent_token');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('virtual_bank_accounts/%s', $id);

        return $this->get($url, [], $headers);
    }
}