<?php

namespace Tests\Unit\Api\Items;

use NathanDunn\Chargebee\Api\Items\Item;
use Tests\Unit\Api\TestCase;

class ItemTest extends TestCase
{
    /** @test */
    public function should_list_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_list.json', __DIR__));

        $item = $this->getApiMock();
        $item->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/items')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item->list([]));
    }

    /** @test */
    public function should_find_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_list.json', __DIR__));

        $item = $this->getApiMock();
        $item->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/items/silver')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item->find('silver'));
    }

    /** @test */
    public function should_create_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_created.json', __DIR__));

        $item = $this->getApiMock();
        $item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/items', ['id' => 'silver', 'name' => 'Silver', 'type' => 'plan', 'item_applicability' => 'all'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item->create(['id' => 'silver', 'name' => 'Silver', 'type' => 'plan', 'item_applicability' => 'all']));
    }

    /** @test */
    public function should_delete_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_deleted.json', __DIR__));

        $item = $this->getApiMock();
        $item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/items/silver/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item->delete('silver'));
    }

    /** @test */
    public function should_update_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/item_updated.json', __DIR__));

        $item = $this->getApiMock();
        $item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/items/basic', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $item->update('basic', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Item::class;
    }
}
