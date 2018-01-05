<?php

namespace Tests\Unit\Api\Invoices;

use NathanDunn\Chargebee\Api\Invoices\Invoice;
use Tests\Unit\Api\TestCase;

class InvoiceTest extends TestCase
{
    /** @test */
    public function should_create_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_created.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->create([]));
    }

    /** @test */
    public function should_list_invoices()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_list.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/invoices', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->list([]));
    }

    /** @test */
    public function should_create_invoice_for_charge()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_created_for_charge.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/charge', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->createForCharge([]));
    }

    /** @test */
    public function should_create_invoice_for_addon()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_created_for_addon.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/charge_addon', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->createForAddon([]));
    }

    /** @test */
    public function should_stop_dunning_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_stopped_dunning.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/47/stop_dunning', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->stopDunning('47'));
    }

    /** @test */
    public function should_import_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_imported.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/import_invoice', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->import([]));
    }

    /** @test */
    public function should_apply_payments_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_payments_applied.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/48/apply_payments', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->applyPayments('48', []));
    }

    /** @test */
    public function should_apply_credits_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_credits_applied.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/50/apply_credits', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->applyCredits('50', []));
    }

    /** @test */
    public function should_find_an_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/invoices/1', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->find('1'));
    }

    /** @test */
    public function should_find_an_invoice_as_pdf()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_as_pdf.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/invoices/1/pdf', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->findAsPdf('1'));
    }

    /** @test */
    public function should_add_charge_item_to_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_pending_charge_added.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/52/add_charge', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->addChargeItem('52', []));
    }

    /** @test */
    public function should_add_addon_item_to_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_pending_addon_item_added.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/54/add_addon_charge', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->addAddonItem('54', []));
    }

    /** @test */
    public function should_close_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_pending_closed.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/56/close', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->close('56', []));
    }

    /** @test */
    public function should_collect_payment_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_payment_collected.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/58/collect_payment', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->collectPayment('58', []));
    }

    /** @test */
    public function should_record_payment_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_payment_recorded.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/60/record_payment', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->recordPayment('60', []));
    }

    /** @test */
    public function should_refund_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_refunded.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/1/refund', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->refund('1', []));
    }

    /** @test */
    public function should_record_refund_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_refunded.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/1/record_refund', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->recordRefund('1', []));
    }

    /** @test */
    public function should_remove_payment_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_payment_removed.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/38/remove_payment', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->removePayment('38', []));
    }

    /** @test */
    public function should_remove_credit_note_for_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_credit_note_removed.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/38/remove_credit_note', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->removeCreditNote('38', []));
    }

    /** @test */
    public function should_void_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_voided.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/62/void', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->void('62', []));
    }

    /** @test */
    public function should_write_off_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_written_off.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/64/write_off', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->writeOff('64', []));
    }

    /** @test */
    public function should_delete_invoice()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/invoice_deleted.json', __DIR__));

        $invoice = $this->getApiMock();
        $invoice->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/invoices/66/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $invoice->delete('66', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Invoice::class;
    }
}
