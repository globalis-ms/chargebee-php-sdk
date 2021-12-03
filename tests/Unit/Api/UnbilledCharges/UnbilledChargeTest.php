<?php

namespace Tests\Unit\Api\UnbilledCharges;

use Globalis\Chargebee\Api\UnbilledCharges\UnbilledCharge;
use Tests\Unit\Api\TestCase;

class UnbilledChargeTest extends TestCase
{
    /** @test */
    public function should_list_unbilled_charges()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/unbilled_charge_list.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/unbilled_charges', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->list([]));
    }

    /** @test */
    public function should_create_estimate_for_unbilled_charge()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/unbilled_charge_estimate_created.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/unbilled_charges/invoice_unbilled_charges', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->invoiceUnbilledCharges([]));
    }

    /** @test */
    public function should_create_invoice_for_unbilled_charge()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/unbilled_charge_invoice_created.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/unbilled_charges/invoice_now_estimate', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->invoiceNowEstimate([]));
    }

    /** @test */
    public function should_delete_unbilled_charge()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/unbilled_charge_deleted.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/unbilled_charges/li_3Nl8LlrQWK3DHW3q/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->delete('li_3Nl8LlrQWK3DHW3q'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return UnbilledCharge::class;
    }
}
