<?php

namespace Tests\Unit\Api\Orders;

use NathanDunn\Chargebee\Api\Orders\Order;
use Tests\Unit\Api\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function should_list_orders()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/order_list.json', __DIR__));

        $order = $this->getApiMock();
        $order->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/orders', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $order->list([]));
    }

    /** @test */
    public function should_find_order()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/order.json', __DIR__));

        $order = $this->getApiMock();
        $order->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/orders/XpbG8t4OvwWgjzM', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $order->find('XpbG8t4OvwWgjzM'));
    }

    /** @test */
    public function should_create_order()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/order_created.json', __DIR__));

        $order = $this->getApiMock();
        $order->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/orders', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $order->create([]));
    }

    /** @test */
    public function should_update_order()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/order_updated.json', __DIR__));

        $order = $this->getApiMock();
        $order->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/orders/XpbG8t4OvwWgjzM', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $order->update('XpbG8t4OvwWgjzM', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Order::class;
    }
}
