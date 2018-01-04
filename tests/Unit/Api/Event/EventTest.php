<?php

namespace Tests\Unit\Api\Events;

use NathanDunn\Chargebee\Api\Events\Event;
use Tests\Unit\Api\TestCase;

class EventTest extends TestCase
{
    /** @test */
    public function should_list_events()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/event_list.json', __DIR__));

        $event = $this->getApiMock();
        $event->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/events')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $event->list([]));
    }

    /** @test */
    public function should_find_event()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/event.json', __DIR__));

        $event = $this->getApiMock();
        $event->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/events/ev_3Nl8LcOQWK2SCu8')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $event->find('ev_3Nl8LcOQWK2SCu8'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Event::class;
    }
}