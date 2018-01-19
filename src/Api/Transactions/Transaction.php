<?php

namespace NathanDunn\Chargebee\Api\Transactions;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Transaction extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('transactions');

        return $this->get($url, $resolver->resolve($parameters), $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('transactions/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $invoiceId
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function listPaymentsForInvoice(string $invoiceId, array $headers = [])
    {
        $url = $this->url('invoices/%s/payments', $invoiceId);

        return $this->get($url, [], $headers);
    }
}
