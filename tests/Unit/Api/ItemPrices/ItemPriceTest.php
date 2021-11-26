<?php

namespace Tests\Unit\Api\ItemPrices;

use NathanDunn\Chargebee\Api\ItemPrices\ItemPrice;
use Tests\Unit\Api\TestCase;

class ItemPriceTest extends TestCase
{
    /** @test */
    public function should_list_item_prices()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_price_list.json', __DIR__));

        $item_price = $this->getApiMock();
        $item_price->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/item_prices')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item_price->list([]));
    }

    /** @test */
    public function should_find_item_price()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_price_list.json', __DIR__));

        $item_price = $this->getApiMock();
        $item_price->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/item_prices/silver-USD-monthly')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item_price->find('silver-USD-monthly'));
    }

    /** @test */
    public function should_create_item_price()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_price_created.json', __DIR__));

        $item_price = $this->getApiMock();
        $item_price->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/item_prices', ['id' => 'silver-USD-monthly', 'item_id' => 'silver', 'name' => 'silver USD monthly', 'pricing_model' => 'per_unit', 'price' => '1000', 'external_name' => 'silver USD', 'period_unit' => 'month', 'period' => '1'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item_price->create(['id' => 'silver-USD-monthly', 'item_id' => 'silver', 'name' => 'silver USD monthly', 'pricing_model' => 'per_unit', 'price' => '1000', 'external_name' => 'silver USD', 'period_unit' => 'month', 'period' => '1']));
    }

    /** @test */
    public function should_delete_item_price()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_price_deleted.json', __DIR__));

        $item_price = $this->getApiMock();
        $item_price->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/item_prices/silver-USD-monthly/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item_price->delete('silver-USD-monthly'));
    }

    /** @test */
    public function should_update_item_price()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_price_updated.json', __DIR__));

        $item_price = $this->getApiMock();
        $item_price->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/item_prices/silver-USD-monthly', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item_price->update('silver-USD-monthly', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return ItemPrice::class;
    }
}
