<?php

namespace Tests\Unit\Api\TimeMachines;

use NathanDunn\Chargebee\Api\TimeMachines\TimeMachine;
use Tests\Unit\Api\TestCase;

class TimeMachineTest extends TestCase
{
    /** @test */
    public function should_get_time_machine()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/time_machine.json', __DIR__));

        $timeMachine = $this->getApiMock();
        $timeMachine->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/time_machines/delorean', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $timeMachine->find('delorean'));
    }

    /** @test */
    public function should_start_afresh()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/time_machine.json', __DIR__));

        $timeMachine = $this->getApiMock();
        $timeMachine->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/time_machines/delorean/start_afresh', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $timeMachine->startAfresh('delorean', []));
    }

    /** @test */
    public function should_travel_forward()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/time_machine.json', __DIR__));

        $timeMachine = $this->getApiMock();
        $timeMachine->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/time_machines/delorean/travel_forward', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $timeMachine->travelForward('delorean', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return TimeMachine::class;
    }
}