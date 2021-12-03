<?php

namespace Tests\Unit\Api\Addresses;

use Globalis\Chargebee\Api\Addresses\Address;
use Tests\Unit\Api\TestCase;

class AddressTest extends TestCase
{
    /** @test */
    public function should_find_address()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/address.json', __DIR__));

        $address = $this->getApiMock();
        $address->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/addresses')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $address->find(['subscription_id' => '8avVGOkx8U1MX', 'label' => 'shipping_address']));
    }

    /** @test */
    public function should_update_address()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/address_updated.json', __DIR__));

        $address = $this->getApiMock();
        $address->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/addresses')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $address->update([]));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Address::class;
    }
}
