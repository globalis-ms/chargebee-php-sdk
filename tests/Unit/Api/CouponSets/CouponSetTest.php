<?php

namespace Tests\Unit\Api\CouponSets;

use NathanDunn\Chargebee\Api\CouponSets\CouponSet;
use Tests\Unit\Api\TestCase;

class CouponSetTest extends TestCase
{
    /** @test */
    public function should_list_coupon_sets()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_list.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->list([]));
    }

    /** @test */
    public function should_find_coupon_set()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets/_cs_Xcrtyqw')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->find('_cs_Xcrtyqw'));
    }

    /** @test */
    public function should_create_coupon_set()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_created.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->create([]));
    }

    /** @test */
    public function should_add_coupon_codes_to_coupon_set()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_codes_added.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets/_cs_Xcrtyqw/add_coupon_codes', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->addCouponCodes('_cs_Xcrtyqw', []));
    }

    /** @test */
    public function should_update_coupon_set()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_updated.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets/_cs_Xcrtyqw/update', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->update('_cs_Xcrtyqw', []));
    }

    /** @test */
    public function should_delete_coupon_set()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_deleted.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets/_cs_Xcrtyqw/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->delete('_cs_Xcrtyqw'));
    }

    /** @test */
    public function should_delete_unused_coupon_codes()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/coupon_set_unused_coupons_deleted.json', __DIR__));

        $portalSession = $this->getApiMock();
        $portalSession->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/coupon_sets/_cs_Xcrtyqw/delete_unused_coupon_codes', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $portalSession->deleteUnusedCouponCodes('_cs_Xcrtyqw'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return CouponSet::class;
    }
}
