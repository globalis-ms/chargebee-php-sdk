<?php

namespace NathanDunn\Chargebee\Api\PromotionalCredits;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class PromotionalCredit extends AbstractApi
{
    /**
     * @return array|string
     * @throws Exception
     */
    public function list()
    {
        $url = $this->url('promotional_credits');

        return $this->get($url);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('promotional_credits/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function set(array $data)
    {
        $url = $this->url('promotional_credits/set');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function add(array $data)
    {
        $url = $this->url('promotional_credits/add');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function deduct(array $data)
    {
        $url = $this->url('promotional_credits/deduct');

        return $this->post($url, $data);
    }
}