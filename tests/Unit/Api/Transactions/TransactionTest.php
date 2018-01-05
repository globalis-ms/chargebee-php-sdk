<?php

namespace Tests\Unit\Api\Transactions;

use NathanDunn\Chargebee\Api\Transactions\Transaction;
use Tests\Unit\Api\TestCase;

class TransactionTest extends TestCase
{
    /** @test */
    public function should_list_transactions()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/transaction_list.json', __DIR__));

        $transaction = $this->getApiMock();
        $transaction->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/transactions', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $transaction->list([]));
    }

    /** @test */
    public function should_find_transaction()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/transaction.json', __DIR__));

        $transaction = $this->getApiMock();
        $transaction->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/transactions/txn_3Nl8LcOQWK2T26O', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $transaction->find('txn_3Nl8LcOQWK2T26O'));
    }

    /** @test */
    public function should_list_transaction_payments()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/transaction_list_for_invoice.json', __DIR__));

        $transaction = $this->getApiMock();
        $transaction->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/invoices/1/payments', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $transaction->listPaymentsForInvoice('1'));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Transaction::class;
    }
}
