<?php

namespace Globalis\Chargebee\Api\PromotionalCredits;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class PromotionalCredit extends AbstractApi
{
    /**
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $headers = [])
    {
        $url = $this->url('promotional_credits');

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
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('promotional_credits/%s', $id);

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
    public function set(array $data, array $headers = [])
    {
        $url = $this->url('promotional_credits/set');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function add(array $data, array $headers = [])
    {
        $url = $this->url('promotional_credits/add');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function deduct(array $data, array $headers = [])
    {
        $url = $this->url('promotional_credits/deduct');

        return $this->post($url, $data, $headers);
    }
}
