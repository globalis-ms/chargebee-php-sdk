<?php

namespace Tests\Unit\Api\VirtualBankAccounts;

use NathanDunn\Chargebee\Api\VirtualBankAccounts\VirtualBankAccount;
use Tests\Unit\Api\TestCase;

class VirtualBankAccountTest extends TestCase
{
    /** @test */
    public function should_list_virtual_bank_accounts()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/virtual_bank_account_list.json', __DIR__));

        $virtualBankAccount = $this->getApiMock();
        $virtualBankAccount->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/virtual_bank_accounts')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $virtualBankAccount->list());
    }

    /** @test */
    public function should_create_virtual_bank_account()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/virtual_bank_account_created.json', __DIR__));

        $virtualBankAccount = $this->getApiMock();
        $virtualBankAccount->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/virtual_bank_accounts')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $virtualBankAccount->create([], []));
    }

    /** @test */
    public function should_create_virtual_bank_account_with_permanent_token()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/virtual_bank_account_created_with_permanent_token.json', __DIR__));

        $virtualBankAccount = $this->getApiMock();
        $virtualBankAccount->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/virtual_bank_accounts/create_using_permanent_token')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $virtualBankAccount->createWithPermanentToken([], []));
    }

    /** @test */
    public function should_find_virtual_bank_account()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/virtual_bank_account.json', __DIR__));

        $virtualBankAccount = $this->getApiMock();
        $virtualBankAccount->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/virtual_bank_accounts/1')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $virtualBankAccount->find(1, []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return VirtualBankAccount::class;
    }
}