<?php

namespace Tests\Unit\Api\Coupons;

use Globalis\Chargebee\Api\Coupons\Coupon;
use Tests\Unit\Api\TestCase;

class CouponTest extends TestCase
{
    /** @test */
    public function should_list_coupons()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_list.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupons')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->list([]));
    }

    /** @test */
    public function should_find_coupon()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_list.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupons/sample_offer')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->find('sample_offer'));
    }

    /** @test */
    public function should_create_coupon_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_created.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupons/create_for_items', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->createForItems([]));
    }

    /** @test */
    public function should_delete_coupon()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_deleted.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupons/beta/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->delete('beta'));
    }

    /** @test */
    public function should_unarchive_coupon()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_unarchived.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupons/beta/unarchive', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->unarchive('beta'));
    }

    /** @test */
    public function should_update_coupon_for_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_updated.json', __DIR__));

        $coupon = $this->getApiMock();
        $coupon->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupons/beta_offer/update_for_items', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $coupon->updateForItems('beta_offer', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Coupon::class;
    }
}
