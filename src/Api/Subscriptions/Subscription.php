<?php

namespace Globalis\Chargebee\Api\Subscriptions;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class Subscription extends AbstractApi
{
    /**
     * Get subscriptions.
     *
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $url = $this->url('subscriptions');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * Find subscriptions.
     *
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
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
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('subscriptions');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function retrieveWithScheduledChanges(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/retrieve_with_scheduled_changes', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledChanges(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_changes', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledCancellation(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_cancellation', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeCoupons(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_coupons', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function changeTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/change_term_end', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function cancel(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/cancel', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function reactivate(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/reactivate', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function addChargeAtTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/add_charge_at_term_end', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function chargeAddonAtTermEnd(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/charge_addon_at_term_end', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
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
     * @throws Exception
     *
     * @return array|string
     */
    public function import(array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/import');

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
    public function importForCustomer(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/customers/%s/import_subscription', $customerId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function overrideBillingProfile(string $id, array $data, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/override_billing_profile', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('subscriptions/%s/delete', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function pause(string $id, array $data = [], array $headers = [])
    {
        $url = $this->url('subscriptions/%s/pause', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function resume(string $id, array $data = [], array $headers = [])
    {
        $url = $this->url('subscriptions/%s/resume', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledPause(string $id, array $data = [], array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_pause', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function removeScheduledResumption(string $id, array $data = [], array $headers = [])
    {
        $url = $this->url('subscriptions/%s/remove_scheduled_resumption', $id);

        return $this->post($url, $data, $headers);
    }
}
