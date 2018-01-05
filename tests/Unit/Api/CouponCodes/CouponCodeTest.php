<?php

namespace Tests\Unit\Api\CouponsCodes;

use NathanDunn\Chargebee\Api\CouponCodes\CouponCode;
use Tests\Unit\Api\TestCase;

class CouponCodeTest extends TestCase
{
    /** @test */
    public function should_list_coupon_codes()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_code_list.json', __DIR__));

        $couponCode = $this->getApiMock();
        $couponCode->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupon_codes')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $couponCode->list([]));
    }

    /** @test */
    public function should_find_coupon_code()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_code.json', __DIR__));

        $couponCode = $this->getApiMock();
        $couponCode->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupon_codes/CBCC4356')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $couponCode->find('CBCC4356'));
    }

    /** @test */
    public function should_archive_coupon_code()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_code_archived.json', __DIR__));

        $couponCode = $this->getApiMock();
        $couponCode->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_codes/CBCC4356/archive')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $couponCode->archive('CBCC4356'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return CouponCode::class;
    }
}
