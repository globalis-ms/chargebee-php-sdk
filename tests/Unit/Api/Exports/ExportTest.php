<?php

namespace Tests\Unit\Api\Exports;

use Globalis\Chargebee\Api\Exports\Export;
use Tests\Unit\Api\TestCase;

class ExportTest extends TestCase
{
    /** @test */
    public function should_find_export()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/export.json', __DIR__));

        $export = $this->getApiMock();
        $export->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/exports/5SK0b4FKQqgl42AA')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $export->find('5SK0b4FKQqgl42AA'));
    }

    /** @test */
    public function should_generate_revenue_recognition_export()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/export_revenue_recognition.json', __DIR__));

        $export = $this->getApiMock();
        $export->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/exports/revenue_recognition')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $export->revenueRecognition());
    }

    /** @test */
    public function should_generate_deferred_revenue_export()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/export_deferred_revenue.json', __DIR__));

        $export = $this->getApiMock();
        $export->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/exports/deferred_revenue')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $export->deferredRevenue());
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Export::class;
    }
}
