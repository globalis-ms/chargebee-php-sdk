<?php

namespace Tests\Unit\Api\Invoices;

use NathanDunn\Chargebee\Api\PromotionalCredits\PromotionalCredit;
use Tests\Unit\Api\TestCase;

class PromotionalCreditTest extends TestCase
{
    /** @test */
    public function should_list_promotional_credits()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/promotional_credit_list.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/promotional_credits', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->list([]));
    }

    /** @test */
    public function should_find_promotional_credit()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/promotional_credit.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/promotional_credits/3Nl8LcOQWK2jMp74', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->find('3Nl8LcOQWK2jMp74'));
    }

    /** @test */
    public function should_add_promotional_credits()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/promotional_credit_added.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/promotional_credits/add', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->add([]));
    }

    /** @test */
    public function should_set_promotional_credits()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/promotional_credit_set.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/promotional_credits/set', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->set([]));
    }

    /** @test */
    public function should_deduct_promotional_credits()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/promotional_credit_set.json', __DIR__));

        $promotionalCredit = $this->getApiMock();
        $promotionalCredit->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/promotional_credits/deduct', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $promotionalCredit->deduct([]));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return PromotionalCredit::class;
    }
}