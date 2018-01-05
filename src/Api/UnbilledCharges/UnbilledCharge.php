<?php

namespace NathanDunn\Chargebee\Api\UnbilledCharges;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class UnbilledCharge extends AbstractApi
{
    /**
     * @throws Exception
     *
     * @return array|string
     */
    public function list()
    {
        $url = $this->url('unbilled_charges');

        return $this->get($url);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function invoiceUnbilledCharges(array $data)
    {
        $url = $this->url('unbilled_charges/invoice_unbilled_charges');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function invoiceNowEstimate(array $data)
    {
        $url = $this->url('unbilled_charges/invoice_now_estimate');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id)
    {
        $url = $this->url('unbilled_charges/%s/delete', $id);

        return $this->post($url, []);
    }
}
