<?php

namespace Tests\Unit\Api\CreditNotes;

use NathanDunn\Chargebee\Api\CreditNotes\CreditNote;
use Tests\Unit\Api\TestCase;

class CreditNoteTest extends TestCase
{
    /** @test */
    public function should_list_credit_notes()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_list.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->list([]));
    }

    /** @test */
    public function should_find_credit_note()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes/TEST-CN-1')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->find('TEST-CN-1'));
    }

    /** @test */
    public function should_find_credit_note_as_pdf()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_as_pdf.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes/TEST-CN-1/pdf')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->findAsPdf('TEST-CN-1'));
    }

    /** @test */
    public function should_create_credit_note()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_created.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->create([]));
    }

    /** @test */
    public function should_record_refund_for_credit_note()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_refund_recorded.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes/TEST-CN-3/record_refund', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->recordRefund('TEST-CN-3', []));
    }

    /** @test */
    public function should_void_credit_note()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_voided.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes/TEST-CN-3/void', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->void('TEST-CN-3', []));
    }

    /** @test */
    public function should_delete_credit_note()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/credit_note_deleted.json', __DIR__));

        $creditNote = $this->getApiMock();
        $creditNote->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/credit_notes/TEST-CN-3/delete', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $creditNote->delete('TEST-CN-3', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return CreditNote::class;
    }
}
