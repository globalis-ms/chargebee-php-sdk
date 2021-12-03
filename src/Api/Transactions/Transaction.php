<?php

namespace Globalis\Chargebee\Api\Transactions;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class Transaction extends AbstractApi
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
        $url = $this->url('transactions');

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
        $url = $this->url('transactions/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $invoiceId
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function listPaymentsForInvoice(string $invoiceId, array $headers = [])
    {
        $url = $this->url('invoices/%s/payments', $invoiceId);

        return $this->get($url, [], $headers);
    }
}
