<?php

namespace Tests\Unit\Api\Subscriptions;

use Globalis\Chargebee\Api\Subscriptions\Subscription;
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
    public function should_list_subscription_discounts()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_discounts_list.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/discounts', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->listDiscounts('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_list_subscription_contract_terms()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_contract_terms_list.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/contract_terms', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->listContractTerms('8avVGOkx8U1MX'));
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
    public function should_create_subscription_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_created.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/8avVGOkx8U1MX/subscription_for_items', ['subscription_items[item_price_id][0]' => 'basic-USD'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->createForItems('8avVGOkx8U1MX', ['subscription_items[item_price_id][0]' => 'basic-USD']));
    }

    /** @test */
    public function should_retrieve_subscription_advance_invoice_schedule()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_advance_invoice_schedules.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/retrieve_advance_invoice_schedule')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->retrieveAdvanceInvoiceSchedule('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_edit_advance_invoice_schedule()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_advance_invoice_schedules.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/edit_advance_invoice', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->editAdvanceInvoiceSchedule('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_remove_advance_invoice_schedule()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_without_advance_invoice_schedules.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/remove_advance_invoice_schedule', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeAdvanceInvoiceSchedules('8avVGOkx8U1MX'));
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
    public function should_remove_subscription_scheduled_cancellation()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/remove_scheduled_cancellation', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeScheduledCancellation('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_remove_subscription_scheduled_resumption()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/remove_scheduled_resumption', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeScheduledResumption('8avVGOkx8U1MX'));
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
    public function should_update_subscription_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_updated.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/update_for_items', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->updateForItems('8avVGOkx8U1MX', []));
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
    public function should_cancel_subscription_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_cancelled.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/cancel_for_items', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->cancelForItems('8avVGOkx8U1MX', []));
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
    public function should_import_contract_term()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_imported_contract_term.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/import_contract_term', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->importContractTerm('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_import_subscription_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_imported_for_items.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/customers/8avVGOkx8U1MX/import_for_items', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->importForItems('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_regenerate_subscription_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_invoice.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/regenerate_invoice', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->regenerateInvoice('8avVGOkx8U1MX', []));
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

    /** @test */
    public function should_pause_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_paused.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/5SK0b4wlQo95kck8R/pause', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->pause('5SK0b4wlQo95kck8R', []));
    }

    /** @test */
    public function should_resume_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_resumed.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/5SK0b4wlQo95kck8R/resume', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->resume('5SK0b4wlQo95kck8R', []));
    }

    /** @test */
    public function should_remove_scheduled_pause()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_scheduled_pause_removed.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/5SK0b4wlQo95kck8R/remove_scheduled_pause', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeScheduledPause('5SK0b4wlQo95kck8R', []));
    }

    /** @test */
    public function should_remove_scheduled_resumption()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/subscription_scheduled_resumption_removed.json', __DIR__));

        $subscription = $this->getApiMock();
        $subscription->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/5SK0b4wlQo95kck8R/remove_scheduled_resumption', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $subscription->removeScheduledResumption('5SK0b4wlQo95kck8R', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Subscription::class;
    }
}
