<?php

namespace Tests\Unit\Api\Subscriptions;

use NathanDunn\Chargebee\Api\Subscriptions\Subscription;
use Tests\Unit\Api\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function should_get_all_subscriptions()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_list.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->list());
    }

    /** @test */
    public function should_find_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->find('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_create_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_created.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions', ['plan_id' => 'basic'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->create([
            'plan_id' => 'basic',
        ]));
    }

    /** @test */
    public function should_retrieve_subscription_with_scheduled_changes()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_with_scheduled_changes.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/retrieve_with_scheduled_changes')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->retrieveWithScheduledChanges('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_remove_subscription_scheduled_changes()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_scheduled_changes_removed.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/remove_scheduled_changes')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeScheduledChanges('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_remove_coupons_from_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_remove_coupons.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/remove_coupons', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeCoupons('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_update_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_remove_coupons.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->update('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_change_term_end_for_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_term_end_changed.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/change_term_end', ['term_ends_at' => 1514501508])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->changeTermEnd('8avVGOkx8U1MX', ['term_ends_at' => 1514501508]));
    }

    /** @test */
    public function should_cancel_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_cancelled.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/cancel', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->cancel('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_reactivate_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_reactivated.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/reactivate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->reactivate('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_add_charge_at_term_end_for_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_charge_added_at_term_end.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/add_charge_at_term_end', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->addChargeAtTermEnd('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_charge_addon_at_term_end_for_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_charge_addon_at_term_end.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/charge_addon_at_term_end', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->chargeAddonAtTermEnd('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_charge_future_renewals_for_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_future_renewals_charged.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/charge_future_renewals', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->chargeFutureRenewals('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_import_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_imported.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/import', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->import([]));
    }

    /** @test */
    public function should_import_subscription_for_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_imported_for_customer.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/customers/8avVGOkx8U1MX/import_subscription', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->importForCustomer('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_override_billing_profile()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_billing_profile_overrode.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/override_billing_profile', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->overrideBillingProfile('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_delete_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_deleted.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->delete('8avVGOkx8U1MX'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Subscription::class;
    }
}
