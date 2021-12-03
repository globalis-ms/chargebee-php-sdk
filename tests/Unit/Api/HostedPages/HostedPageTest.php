<?php

namespace Tests\Unit\Api\Events;

use Globalis\Chargebee\Api\HostedPages\HostedPage;
use Tests\Unit\Api\TestCase;

class HostedPageTest extends TestCase
{
    /** @test */
    public function should_list_hosted_pages()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_list.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->list([]));
    }

    /** @test */
    public function should_find_hosted_page()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/QxjWg9dNDn3TeokQWefsTrfRHvaqNuP4')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->find('QxjWg9dNDn3TeokQWefsTrfRHvaqNuP4'));
    }

    /** @test */
    public function should_update_payment_method()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_payment_method_updated.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/update_payment_method')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->updatePaymentMethod([]));
    }

    /** @test */
    public function should_acknowledge_hosted_page()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_payment_method_updated.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/QxjWg9dNDn3TeokQWefsTrfRHvaqNuP4/acknowledge')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->acknowledge('QxjWg9dNDn3TeokQWefsTrfRHvaqNuP4'));
    }

    /** @test */
    public function should_checkout_new_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_new_subscription_checked_out.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/checkout_new')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->checkoutNewSubscription([]));
    }

    /** @test */
    public function should_checkout_existing_subscription()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_new_subscription_checked_out.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/checkout_existing')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->checkoutExistingSubscription([]));
    }

    /** @test */
    public function should_checkout_and_collect_now()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_collect_now.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/collect_now')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->collectNow());
    }

    /** @test */
    public function should_checkout_and_manage_payment_sources()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/hosted_page_manage_payment_sources.json', __DIR__));

        $hostedPages = $this->getApiMock();
        $hostedPages->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/hosted_pages/manage_payment_sources')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $hostedPages->managePaymentSources());
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return HostedPage::class;
    }
}
