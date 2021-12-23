<?php

namespace Tests\Unit\Api\AttachedItems;

use Globalis\Chargebee\Api\AttachedItems\AttachedItem;
use Tests\Unit\Api\TestCase;

class AttachedItemTest extends TestCase
{
    /** @test */
    public function should_list_attached_items()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/attached_item_list.json', __DIR__));

        $attached_item = $this->getApiMock();
        $attached_item->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/attached_items')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $attached_item->list([]));
    }

    /** @test */
    public function should_find_attached_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/attached_item_list.json', __DIR__));

        $attached_item = $this->getApiMock();
        $attached_item->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/attached_items/a0d63a3a-4bea-4621-b4c9-1bb7f833a603')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $attached_item->find('a0d63a3a-4bea-4621-b4c9-1bb7f833a603', ['parent_item_id' => 'cb-demo']));
    }

    /** @test */
    public function should_create_attached_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/attached_item_created.json', __DIR__));

        $attached_item = $this->getApiMock();
        $attached_item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/attached_items', ['item_id' => 'day-pass', 'type' => 'mandatory', 'quantity' => '1'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $attached_item->create(['item_id' => 'day-pass', 'type' => 'mandatory', 'quantity' => '1']));
    }

    /** @test */
    public function should_delete_attached_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/attached_item_deleted.json', __DIR__));

        $attached_item = $this->getApiMock();
        $attached_item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/attached_items/a0d63a3a-4bea-4621-b4c9-1bb7f833a603/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $attached_item->delete('a0d63a3a-4bea-4621-b4c9-1bb7f833a603'));
    }

    /** @test */
    public function should_update_attached_item()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/attached_item_updated.json', __DIR__));

        $attached_item = $this->getApiMock();
        $attached_item->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/attached_items/a0d63a3a-4bea-4621-b4c9-1bb7f833a603', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $attached_item->update('a0d63a3a-4bea-4621-b4c9-1bb7f833a603', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return AttachedItem::class;
    }
}
