<?php

namespace NathanDunn\Chargebee\Api\Subscriptions;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Subscription extends AbstractApi
{
    /**
     * Get subscriptions.
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

        $resolver->setDefined('include_deleted')
            ->setAllowedTypes('include_deleted', 'boolean');

        $resolver->setDefined('sort_by')
            ->setAllowedTypes('sort_by', 'string');

        $url = $this->url('subscriptions');

        return $this->get($url, $resolver->resolve($parameters), $headers);
    }

    /**
     * Find subscriptions.
     *
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * Create a subscription.
     *
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('subscriptions');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function retrieveWithScheduledChanges(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/retrieve_with_scheduled_changes', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function removeScheduledChanges(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_changes', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function removeScheduledCancellation(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_cancellation', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function removeCoupons(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_coupons', $id);

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
        $url = $this->url('subscriptions/%s', $id);

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
    public function changeTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/change_term_end', $id);

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
    public function cancel(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/cancel', $id);

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
    public function reactivate(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/reactivate', $id);

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
    public function addChargeAtTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/add_charge_at_term_end', $id);

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
    public function chargeAddonAtTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/charge_addon_at_term_end', $id);

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
    public function chargeFutureRenewals(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/charge_future_renewals', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function import(array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/import');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $customerId
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function importForCustomer(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/customers/%s/import_subscription', $customerId);

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
    public function overrideBillingProfile(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/override_billing_profile', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/delete', $id);

        return $this->post($url, [], $headers);
    }
}
