<?php

namespace NathanDunn\Chargebee\Api\Invoices;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Invoice extends AbstractApi
{
    /**
     * @param array $parameters
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $resolver->setDefined('include_deleted')
            ->setAllowedTypes('include_deleted', 'boolean');

        $resolver->setDefined('sort_by')
            ->setAllowedTypes('sort_by', 'string');

        $url = $this->url('invoices');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data)
    {
        $url = $this->url('invoices');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function createForCharge(array $data)
    {
        $url = $this->url('invoices/charge');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function createForAddon(array $data)
    {
        $url = $this->url('invoices/charge_addon');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function stopDunning(string $id)
    {
        $url = $this->url('invoices/%s/stop_dunning', $id);

        return $this->post($url, []);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function import(array $data)
    {
        $url = $this->url('invoices/import_invoice');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function applyPayments(string $id, array $data)
    {
        $url = $this->url('invoices/%s/apply_payments', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function applyCredits(string $id, array $data)
    {
        $url = $this->url('invoices/%s/apply_credits', $id);

        return $this->post($url, $data);
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
        $url = $this->url('invoices/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function findAsPdf(string $id)
    {
        $url = $this->url('invoices/%s/pdf', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function addChargeItem(string $id, array $data)
    {
        $url = $this->url('invoices/%s/add_charge', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function addAddonItem(string $id, array $data)
    {
        $url = $this->url('invoices/%s/add_addon_charge', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function close(string $id, array $data)
    {
        $url = $this->url('invoices/%s/close', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function collectPayment(string $id, array $data)
    {
        $url = $this->url('invoices/%s/collect_payment', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function recordPayment(string $id, array $data)
    {
        $url = $this->url('invoices/%s/record_payment', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function refund(string $id, array $data)
    {
        $url = $this->url('invoices/%s/refund', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function recordRefund(string $id, array $data)
    {
        $url = $this->url('invoices/%s/record_refund', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removePayment(string $id, array $data)
    {
        $url = $this->url('invoices/%s/remove_payment', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeCreditNote(string $id, array $data)
    {
        $url = $this->url('invoices/%s/remove_credit_note', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function void(string $id, array $data)
    {
        $url = $this->url('invoices/%s/void', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function writeOff(string $id, array $data)
    {
        $url = $this->url('invoices/%s/write_off', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id, array $data)
    {
        $url = $this->url('invoices/%s/delete', $id);

        return $this->post($url, $data);
    }
}
