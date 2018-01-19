<?php

namespace NathanDunn\Chargebee\Api\Customers;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Customer extends AbstractApi
{
    /**
     * Get customers.
     *
     * @param array $parameters
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('customers');

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
        $url = $this->url('customers/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('customers');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function update(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function updatePaymentMethod(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/update_payment_method', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function updateBillingInfo(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/update_billing_info', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function assignPaymentRole(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/assign_payment_role', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function addContact(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/add_contact', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function updateContact(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/update_contact', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function deleteContact(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/delete_contact', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function recordExcessPayment(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/record_excess_payment', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function collectPayment(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/collect_payment', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/delete', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function move(array $data, array $headers = [])
    {
        $url = $this->url('customers/move');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function changeBillingDate(string $id, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/change_billing_date', $id);

        return $this->post($url, $data, $headers);
    }
}
