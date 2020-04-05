<?php

namespace Tests\Unit\Api\Gift;

use NathanDunn\Chargebee\Api\Gifts\Gift;
use Tests\Unit\Api\TestCase;

class GiftTest extends TestCase
{
    /** @test */
    public function should_list_gifts()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift_list.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/gifts', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->list());
    }

    /** @test */
    public function should_create_gift()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift_created.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/gifts', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->create([]));
    }

    /** @test */
    public function should_find_gift()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/gifts/__test__KyVnJjRnFYZbj5ow__test__QEsG9QUrFbnHXZcuUKpaFWdJhjObTBy1y', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->find('__test__KyVnJjRnFYZbj5ow__test__QEsG9QUrFbnHXZcuUKpaFWdJhjObTBy1y', []));
    }

    /** @test */
    public function should_claim_gift()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift_claimed.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/gifts/__test__KyVnJjRnFYZGl5oA__test__jcuCMZQKJ6sYN2vBjMPDgj4HrIXqymFcd8/claim', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->claim('__test__KyVnJjRnFYZGl5oA__test__jcuCMZQKJ6sYN2vBjMPDgj4HrIXqymFcd8', []));
    }

    /** @test */
    public function should_update_gift()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift_updated.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/gifts/__test__KyVnJjRnFYZft5p7__test__IcZatatjJJ2FEXTAVuYTXTve1BaBNNwf/update_gift', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->update('__test__KyVnJjRnFYZft5p7__test__IcZatatjJJ2FEXTAVuYTXTve1BaBNNwf', []));
    }

    /** @test */
    public function should_cancel_gift()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/gift_canceled.json', __DIR__));

        $gift = $this->getApiMock();
        $gift->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/gifts/__test__KyVnJjRnFYZBY5nx__test__8Bi8ic6wIHQcunjfGyeuao6cuKyZyjOmVc/cancel', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $gift->cancel('__test__KyVnJjRnFYZBY5nx__test__8Bi8ic6wIHQcunjfGyeuao6cuKyZyjOmVc', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Gift::class;
    }
}
