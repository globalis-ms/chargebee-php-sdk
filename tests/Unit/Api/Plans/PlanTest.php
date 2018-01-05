<?php

namespace Tests\Unit\Api\Plans;

use NathanDunn\Chargebee\Api\Plans\Plan;
use Tests\Unit\Api\TestCase;

class PlanTest extends TestCase
{
    /** @test */
    public function should_list_plans()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan_list.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/plans')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->list());
    }

    /** @test */
    public function should_find_plan()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/plans/basic')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->find('basic'));
    }

    /** @test */
    public function should_create_plan()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan_created.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/plans', ['id' => 'silver', 'name' => 'Silver', 'currency_code' => 'USD'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->create(['id' => 'silver', 'name' => 'Silver', 'currency_code' => 'USD']));
    }

    /** @test */
    public function should_update_plan()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan_updated.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/plans/basic', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->update('basic', []));
    }

    /** @test */
    public function should_copy_plan()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan_copied.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/plans/copy', ['from_site' => 'acme', 'id_at_from_site' => 'acme-test'])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->copy(['from_site' => 'acme', 'id_at_from_site' => 'acme-test']));
    }

    /** @test */
    public function should_unarchive_plan()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/plan_copied.json', __DIR__));

        $plan = $this->getApiMock();
        $plan->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/plans/basic_v2/unarchive', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $plan->unarchive('basic_v2'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Plan::class;
    }
}
