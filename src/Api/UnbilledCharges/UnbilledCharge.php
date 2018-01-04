<?php

namespace NathanDunn\Chargebee\Api\UnbilledCharges;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class UnbilledCharge extends AbstractApi
{
    /**
     * @return array|string
     * @throws Exception
     */
    public function list()
    {
        $url = $this->url('unbilled_charges');

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function invoiceUnbilledCharges(array $data)
    {
        $url = $this->url('unbilled_charges/invoice_unbilled_charges');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function invoiceNowEstimate(array $data)
    {
        $url = $this->url('unbilled_charges/invoice_now_estimate');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id)
    {
        $url = $this->url('unbilled_charges/%s/delete', $id);

        return $this->post($url, []);
    }
}