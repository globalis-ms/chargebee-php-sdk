<?php

namespace Tests\Unit\Api\Cards;

use NathanDunn\Chargebee\Api\Cards\Card;
use Tests\Unit\Api\TestCase;

class CardTest extends TestCase
{
    /** @test */
    public function should_find_card()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/card.json', __DIR__));

        $card = $this->getApiMock();
        $card->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/cards/8avVGOkx8U1MX')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $card->find('8avVGOkx8U1MX'));
    }

    /** @test */
    public function should_copy_card()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/card_copied.json', __DIR__));

        $card = $this->getApiMock();
        $card->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/copy_card', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $card->copy('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_delete_card()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/card_deleted.json', __DIR__));

        $card = $this->getApiMock();
        $card->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/delete_card', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $card->delete('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_switch_gateway()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/card_gateway_switched.json', __DIR__));

        $card = $this->getApiMock();
        $card->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/switch_gateway', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $card->switchGateway('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_update_card()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/card_updated.json', __DIR__));

        $card = $this->getApiMock();
        $card->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/credit_card', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $card->update('4gkYnd21ouvW', []));
    }
    
    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Card::class;
    }
}