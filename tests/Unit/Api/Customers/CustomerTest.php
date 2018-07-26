<?php

namespace Tests\Unit\Api\Customers;

use NathanDunn\Chargebee\Api\Customers\Customer;
use Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException;
use Tests\Unit\Api\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function should_list_customers()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_list.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/customers', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->list());
    }

    /**
     * @test
     * @dataProvider filters
     */
    public function should_filter_customers($filters)
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_list.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/customers', $filters)
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->list($filters));
    }

    public function filters()
    {
        return [
            'email'      => [['email[is]' => 'test@test.com']],
            'first name' => [['first_name[is]' => 'John']],
            'last name'  => [['last_name[is]' => 'Doe']],
        ];
    }

    /**
     * @test
     */
    public function should_reject_unregistered_filters()
    {
        $filters = ['unkown' => 'field'];

        $expected = $this->getContent(sprintf('%s/data/responses/customer_list.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->never())
            ->method('get');

        $this->expectException(UndefinedOptionsException::class);
        $customer->list($filters);
    }

    /** @test */
    public function should_find_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->find('4gkYnd21ouvW'));
    }

    /** @test */
    public function should_create_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_created.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->create([]));
    }

    /** @test */
    public function should_update_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_updated.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->update('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_update_payment_method_for_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_updated_payment_method.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/update_payment_method', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->updatePaymentMethod('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_update_billing_info_for_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_updated_billing_info.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/update_billing_info', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->updateBillingInfo('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_assign_payment_role()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_assign_payment_role.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/assign_payment_role', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->assignPaymentRole('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_add_contact()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_contact_created.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/add_contact', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->addContact('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_update_contact()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_contact_updated.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/update_contact', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->updateContact('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_delete_contact()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_contact_deleted.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/delete_contact', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->deleteContact('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_record_excess_payment()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_excess_payment_recorded.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/record_excess_payment', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->recordExcessPayment('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_collect_payment()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_collect_payment.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/collect_payment', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->collectPayment('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_delete_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_deleted.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/delete', ['delete_payment_method' => true])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->delete('4gkYnd21ouvW', ['delete_payment_method' => true]));
    }

    /** @test */
    public function should_move_customer()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_moved.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/move', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->move([]));
    }

    /** @test */
    public function should_change_billing_date()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_billing_date_changed.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('post')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/change_billing_date', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->changeBillingDate('4gkYnd21ouvW', []));
    }

    /** @test */
    public function should_list_contacts()
    {
        $expected = $this->getContent(sprintf('%s/data/responses/customer_contacts_list.json', __DIR__));

        $customer = $this->getApiMock();
        $customer->expects($this->once())
            ->method('get')
            ->with('https://123456789.chargebee.com/api/v2/customers/4gkYnd21ouvW/contacts', [])
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $customer->contacts('4gkYnd21ouvW', []));
    }

    /**
     * @return string
     */
    protected function getApiClass()
    {
        return Customer::class;
    }
}
