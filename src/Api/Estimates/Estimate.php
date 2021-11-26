<?php

namespace Globalis\Chargebee\Api\Estimates;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class Estimate extends AbstractApi
{
    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function createSubscription(array $data, array $headers = [])
    {
        $url = $this->url('estimates/create_subscription');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $customerId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function createSubscriptionEstimate(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/create_subscription_estimate', $customerId);

        return $this->post($url, $data, $headers);
    }

    public function createCustomerAndSubscriptionForItems(array $data, array $headers = [])
    {
        $url = $this->url('estimates/create_subscription_for_items');

        return $this->post($url, $data, $headers);
    }

    public function createSubscriptionForItems(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/create_subscription_for_items_estimate', $customerId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array  $parameters
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function renewalEstimate(string $subscriptionId, array $parameters = [], array $headers = [])
    {
        $url = $this->url('subscriptions/%s/renewal_estimate', $subscriptionId);

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param string $customerId
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function upcomingInvoicesEstimate(string $customerId, array $headers = [])
    {
        $url = $this->url('customers/%s/upcoming_invoices_estimate', $customerId);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function changeTermEndEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/change_term_end_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function cancelSubscriptionEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/cancel_subscription_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function pauseSubscriptionEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/pause_subscription_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function resumeSubscriptionEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/resume_subscription_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }
}
