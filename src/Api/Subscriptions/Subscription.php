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

        $url = $this->url('subscriptions');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * Find subscriptions.
     *
     * @param $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id)
    {
        $url = $this->url('subscriptions/%s', $id);

        return $this->get($url);
    }

    /**
     * Create a subscription.
     *
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data)
    {
        $url = $this->url('subscriptions');

        return $this->post($url, $data);
    }

    /**
     * @param $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function retrieveWithScheduledChanges(string $id)
    {
        $url = $this->url('subscriptions/%s/retrieve_with_scheduled_changes', $id);

        return $this->get($url);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledChanges(string $id)
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_changes', $id);

        return $this->post($url, []);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledCancellation(string $id)
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_cancellation', $id);

        return $this->post($url, []);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeCoupons(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/remove_coupons', $id);

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
    public function update(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s', $id);

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
    public function changeTermEnd(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/change_term_end', $id);

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
    public function cancel(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/cancel', $id);

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
    public function reactivate(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/reactivate', $id);

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
    public function addChargeAtTermEnd(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/add_charge_at_term_end', $id);

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
    public function chargeAddonAtTermEnd(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/charge_addon_at_term_end', $id);

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
    public function chargeFutureRenewals(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/charge_future_renewals', $id);

        return $this->post($url, $data);
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
        $url = $this->url('subscriptions/import');

        return $this->post($url, $data);
    }

    /**
     * @param string $customerId
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function importForCustomer(string $customerId, array $data)
    {
        $url = $this->url('subscriptions/customers/%s/import_subscription', $customerId);

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
    public function overrideBillingProfile(string $id, array $data)
    {
        $url = $this->url('subscriptions/%s/override_billing_profile', $id);

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id)
    {
        $url = $this->url('subscriptions/%s/delete', $id);

        return $this->post($url, []);
    }
}
