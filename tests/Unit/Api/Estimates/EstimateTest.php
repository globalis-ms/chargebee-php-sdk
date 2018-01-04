<?php

namespace Tests\Unit\Api\Estimates;

use NathanDunn\Chargebee\Api\Estimates\Estimate;
use Tests\Unit\Api\TestCase;

class EstimateTest extends TestCase
{
    /** @test */
    public function should_create_subscription_estimate()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_created_for_subscription.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/estimates/create_subscription', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->createSubscription([]));
    }

    /** @test */
    public function should_create_subscription_estimate_for_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_subscription_created.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/create_subscription_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->createSubscriptionEstimate('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_get_subscription_renewal_estimate()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_subscription_renewed.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/4gkYnd21ouvW/renewal_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->renewalEstimate('4gkYnd21ouvW'));
    }

    /** @test */
    public function should_get_estimate_upcoming_invoices()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_upcoming_invoices.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/upcoming_invoices_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->upcomingInvoicesEstimate('4gkYnd21ouvW'));
    }

    /** @test */
    public function should_change_subscription_term_end_estimate()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_term_end_changed.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/change_term_end_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->changeTermEndEstimate('8avVGOkx8U1MX', []));
    }

    /** @test */
    public function should_cancel_subscription_estimate()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/estimate_subscription_cancelled.json', __DIR__));

        $estimate = $this->getApiMock();
        $estimate->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/subscriptions/8avVGOkx8U1MX/cancel_subscription_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $estimate->cancelSubscriptionEstimate('8avVGOkx8U1MX', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Estimate::class;
    }
}