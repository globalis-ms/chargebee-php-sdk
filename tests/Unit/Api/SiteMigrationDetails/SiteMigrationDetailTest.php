<?php

namespace Tests\Unit\Api\SiteMigrationDetails;

use NathanDunn\Chargebee\Api\SiteMigrationDetails\SiteMigrationDetail;
use Tests\Unit\Api\TestCase;

class SiteMigrationDetailTest extends TestCase
{
    /** @test */
    public function should_list_site_migration_details()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/site_migration_detail_list.json', __DIR__));

        $siteMigrationDetails = $this->getApiMock();
        $siteMigrationDetails->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/site_migration_details')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $siteMigrationDetails->list());
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return SiteMigrationDetail::class;
    }
}