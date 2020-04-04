<?php

namespace Tests\Unit\Api\PaymentIntent;

use NathanDunn\Chargebee\Api\PaymentIntents\PaymentIntent;
use Tests\Unit\Api\TestCase;

class PaymentIntentTest extends TestCase
{
    /** @test */
    public function should_find_payment_intent()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_intent.json', __DIR__));

        $paymentIntent = $this->getApiMock();
        $paymentIntent->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/payment_intents/__test__KyVnJjRnFcqrx8nl__test__nJYZzyzNQhx1JThL3nyfoNGSFUQSZOdQ')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentIntent->find('__test__KyVnJjRnFcqrx8nl__test__nJYZzyzNQhx1JThL3nyfoNGSFUQSZOdQ'));
    }

    /** @test */
    public function should_create_payment_intent()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_intent_created.json', __DIR__));

        $paymentIntent = $this->getApiMock();
        $paymentIntent->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_intents')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentIntent->create([]));
    }

    /** @test */
    public function should_update_payment_intent()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/payment_intent_updated.json', __DIR__));

        $paymentIntent = $this->getApiMock();
        $paymentIntent->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/payment_intents/__test__KyVnJjRnFcrRw8nm__test__394jkcuq4Fp04WTkYdxacdq7bEZ7UYQ9il')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $paymentIntent->update('__test__KyVnJjRnFcrRw8nm__test__394jkcuq4Fp04WTkYdxacdq7bEZ7UYQ9il', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return PaymentIntent::class;
    }
}
