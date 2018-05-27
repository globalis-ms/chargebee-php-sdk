<?php

namespace NathanDunn\Chargebee\Api\Estimates;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
        $resolver = new OptionsResolver();

        $resolver->setDefined('use_existing_balances')
            ->setAllowedTypes('use_existing_balances', 'boolean');
        $resolver->setDefined('invoice_immediately')
            ->setAllowedTypes('invoice_immediately', 'boolean');
        $resolver->setDefined('billing_cycles')
            ->setAllowedTypes('billing_cycles', 'integer');
        $resolver->setDefined('terms_to_charge')
            ->setAllowedTypes('terms_to_charge', 'integer')
            ->setAllowedValues('terms_to_charge', function ($value) {
                return $value > 0;
            });
        $resolver->setDefined('billing_alignment_mode')
            ->setAllowedTypes('billing_alignment_mode', 'string')
            ->setAllowedValues('billing_alignment_mode', ['immediate', 'delayed']);
        $resolver->setDefined('coupon_ids');
        $resolver->setDefined('subscription');
        $resolver->setDefined('shipping_address');
        $resolver->setDefined('addons');

        $url = $this->url('subscriptions/%s/renewal_estimate', $subscriptionId);

        return $this->get($url, $resolver->resolve($parameters), $headers);
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
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function pauseSubscriptionEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/pause_subscription_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $subscriptionId
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function resumeSubscriptionEstimate(string $subscriptionId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/resume_subscription_estimate', $subscriptionId);

        return $this->post($url, $data, $headers);
    }
}
