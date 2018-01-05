<?php

namespace NathanDunn\Chargebee\Api\PromotionalCredits;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class PromotionalCredit extends AbstractApi
{
    /**
     * @throws Exception
     *
     * @return array|string
     */
    public function list()
    {
        $url = $this->url('promotional_credits');

        return $this->get($url);
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
        $url = $this->url('promotional_credits/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function set(array $data)
    {
        $url = $this->url('promotional_credits/set');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function add(array $data)
    {
        $url = $this->url('promotional_credits/add');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function deduct(array $data)
    {
        $url = $this->url('promotional_credits/deduct');

        return $this->post($url, $data);
    }
}
