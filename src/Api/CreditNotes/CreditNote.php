<?php

namespace NathanDunn\Chargebee\Api\CreditNotes;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CreditNote extends AbstractApi
{
    /**
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('credit_notes');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('credit_notes/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function findAsPdf(string $id)
    {
        $url = $this->url('credit_notes/%s/pdf', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('credit_notes');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function recordRefund(string $id, array $data)
    {
        $url = $this->url('credit_notes/%s/record_refund', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function void(string $id, array $data)
    {
        $url = $this->url('credit_notes/%s/void', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $data)
    {
        $url = $this->url('credit_notes/%s/delete', $id);

        return $this->post($url, $data);
    }
}