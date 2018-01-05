<?php

namespace Tests\Unit\Api\PaymentSources;

use NathanDunn\Chargebee\Api\PaymentSources\PaymentSource;
use Tests\Unit\Api\TestCase;

class PaymentSourceTest extends TestCase
{
    /** @test */
    public function should_list_payment_sources()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_list.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->list());
    }

    /** @test */
    public function should_find_payment_source()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/pm_3Nl8LcOQWK2Rkh6')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->find('pm_3Nl8LcOQWK2Rkh6'));
    }

    /** @test */
    public function should_create_payment_source_using_temporary_token()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_created_using_temporary_token.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/create_using_temp_token')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->createUsingTemporaryToken([]));
    }

    /** @test */
    public function should_create_payment_source_using_permanent_token()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_created_using_permanent_token.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/create_using_permanent_token')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->createUsingPermanentToken([]));
    }

    /** @test */
    public function should_create_card()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_card_created.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/create_card')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->createCard([]));
    }

    /** @test */
    public function should_update_card_payment_source()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_card_updated.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/pm_3Nl8LcOQWK2Rkh6/update_card')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->updateCard('pm_3Nl8LcOQWK2Rkh6', []));
    }

    /** @test */
    public function should_switch_gateway_account()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_gateway_account_switched.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/pm_3Nl8LcOQWK2Rkh6/switch_gateway_account')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->switchGatewayAccount('pm_3Nl8LcOQWK2Rkh6', []));
    }

    /** @test */
    public function should_export_payment_source()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_exported.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/pm_3Nl8LcOQWK2Rkh6/export_payment_source')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->export('pm_3Nl8LcOQWK2Rkh6', []));
    }

    /** @test */
    public function should_delete_payment_source()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_source_deleted.json', __DIR__));

        $paymentSource = $this->getApiMock();
        $paymentSource->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_sources/pm_3Nl8LcOQWK2Rkh6/delete')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentSource->delete('pm_3Nl8LcOQWK2Rkh6'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return PaymentSource::class;
    }
}
