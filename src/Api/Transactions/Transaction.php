<?php

namespace NathanDunn\Chargebee\Api\Transactions;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Transaction extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('transactions');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('transactions/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $invoiceId
     * @return array|string
     * @throws Exception
     */
    public function listPaymentsForInvoice(string $invoiceId)
    {
        $url = $this->url('invoices/%s/payments', $invoiceId);

        return $this->get($url);
    }
}