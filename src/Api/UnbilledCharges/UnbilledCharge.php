<?php

namespace NathanDunn\Chargebee\Api\UnbilledCharges;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class UnbilledCharge extends AbstractApi
{
    /**
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function list(array $headers = [])
    {
        $url = $this->url('unbilled_charges');

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function invoiceUnbilledCharges(array $data, array $headers = [])
    {
        $url = $this->url('unbilled_charges/invoice_unbilled_charges');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function invoiceNowEstimate(array $data, array $headers = [])
    {
        $url = $this->url('unbilled_charges/invoice_now_estimate');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('unbilled_charges/%s/delete', $id);

        return $this->post($url, [], $headers);
    }
}
