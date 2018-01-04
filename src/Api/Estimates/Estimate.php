<?php

namespace NathanDunn\Chargebee\Api\Estimates;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Estimate extends AbstractApi
{
    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function createSubscription(array $data)
    {
        $url = $this->url('estimates/create_subscription');

        return $this->post($url, $data);
    }

    /**
     * @param string $customerId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function createSubscriptionEstimate(string $customerId, array $data)
    {
        $url = $this->url('customers/%s/create_subscription_estimate', $customerId);

        return $this->post($url, $data);
    }

    /**
     * @param string $subscriptionId
     * @param array $parameters
     * @return array|string
     * @throws Exception
     */
    public function renewalEstimate(string $subscriptionId, array $parameters = [])
    {
        $resolver = new OptionsResolver;

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

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $customerId
     * @return array|string
     * @throws Exception
     */
    public function upcomingInvoicesEstimate(string $customerId)
    {
        $url = $this->url('customers/%s/upcoming_invoices_estimate', $customerId);

        return $this->get($url);
    }

    /**
     * @param string $subscriptionId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function changeTermEndEstimate(string $subscriptionId, array $data)
    {
        $url = $this->url('subscriptions/%s/change_term_end_estimate', $subscriptionId);

        return $this->post($url, $data);
    }

    /**
     * @param string $subscriptionId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function cancelSubscriptionEstimate(string $subscriptionId, array $data)
    {
        $url = $this->url('subscriptions/%s/cancel_subscription_estimate', $subscriptionId);

        return $this->post($url, $data);
    }
}