<?php

namespace Tests\Unit;

use Http\Client\Common\HttpMethodsClient;
use NathanDunn\Chargebee\Api\Addons\Addon;
use NathanDunn\Chargebee\Api\Addresses\Address;
use NathanDunn\Chargebee\Api\Cards\Card;
use NathanDunn\Chargebee\Api\CouponCodes\CouponCode;
use NathanDunn\Chargebee\Api\Coupons\Coupon;
use NathanDunn\Chargebee\Api\CouponSets\CouponSet;
use NathanDunn\Chargebee\Api\CreditNotes\CreditNote;
use NathanDunn\Chargebee\Api\Customers\Customer;
use NathanDunn\Chargebee\Api\Estimates\Estimate;
use NathanDunn\Chargebee\Api\Events\Event;
use NathanDunn\Chargebee\Api\Exports\Export;
use NathanDunn\Chargebee\Api\HostedPages\HostedPage;
use NathanDunn\Chargebee\Api\Invoices\Invoice;
use NathanDunn\Chargebee\Api\Orders\Order;
use NathanDunn\Chargebee\Api\PaymentIntents\PaymentIntent;
use NathanDunn\Chargebee\Api\PaymentSources\PaymentSource;
use NathanDunn\Chargebee\Api\Plans\Plan;
use NathanDunn\Chargebee\Api\PortalSessions\PortalSession;
use NathanDunn\Chargebee\Api\PromotionalCredits\PromotionalCredit;
use NathanDunn\Chargebee\Api\SiteMigrationDetails\SiteMigrationDetail;
use NathanDunn\Chargebee\Api\Subscriptions\Subscription;
use NathanDunn\Chargebee\Api\TimeMachines\TimeMachine;
use NathanDunn\Chargebee\Api\Transactions\Transaction;
use NathanDunn\Chargebee\Api\UnbilledCharges\UnbilledCharge;
use NathanDunn\Chargebee\Api\VirtualBankAccounts\VirtualBankAccount;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /** @test */
    public function should_get_http_client()
    {
        $httpClient = $this->client->getHttpClient();

        $this->assertInstanceOf(HttpMethodsClient::class, $httpClient);
    }

    /** @test */
    public function should_get_subscription()
    {
        $subscription = $this->client->subscription();

        $this->assertInstanceOf(Subscription::class, $subscription);
    }

    /** @test */
    public function should_get_customer()
    {
        $customer = $this->client->customer();

        $this->assertInstanceOf(Customer::class, $customer);
    }

    /** @test */
    public function should_get_invoice()
    {
        $order = $this->client->invoice();

        $this->assertInstanceOf(Invoice::class, $order);
    }

    /** @test */
    public function should_get_order()
    {
        $order = $this->client->order();

        $this->assertInstanceOf(Order::class, $order);
    }

    /** @test */
    public function should_get_card()
    {
        $card = $this->client->card();

        $this->assertInstanceOf(Card::class, $card);
    }

    /** @test */
    public function should_get_addon()
    {
        $addon = $this->client->addon();

        $this->assertInstanceOf(Addon::class, $addon);
    }

    /** @test */
    public function should_get_address()
    {
        $address = $this->client->address();

        $this->assertInstanceOf(Address::class, $address);
    }

    /** @test */
    public function should_get_coupon_code()
    {
        $couponCode = $this->client->couponCode();

        $this->assertInstanceOf(CouponCode::class, $couponCode);
    }

    /** @test */
    public function should_get_coupon()
    {
        $coupon = $this->client->coupon();

        $this->assertInstanceOf(Coupon::class, $coupon);
    }

    /** @test */
    public function should_get_coupon_set()
    {
        $couponSet = $this->client->couponSet();

        $this->assertInstanceOf(CouponSet::class, $couponSet);
    }

    /** @test */
    public function should_get_credit_note()
    {
        $creditNote = $this->client->creditNote();

        $this->assertInstanceOf(CreditNote::class, $creditNote);
    }

    /** @test */
    public function should_get_estimate()
    {
        $estimate = $this->client->estimate();

        $this->assertInstanceOf(Estimate::class, $estimate);
    }

    /** @test */
    public function should_get_event()
    {
        $event = $this->client->event();

        $this->assertInstanceOf(Event::class, $event);
    }

    /** @test */
    public function should_get_export()
    {
        $event = $this->client->export();

        $this->assertInstanceOf(Export::class, $event);
    }

    /** @test */
    public function should_get_hosted_page()
    {
        $hostedPage = $this->client->hostedPage();

        $this->assertInstanceOf(HostedPage::class, $hostedPage);
    }

    public function should_get_payment_intent()
    {
        $paymentSource = $this->client->paymentIntent();

        $this->assertInstanceOf(PaymentIntent::class, $paymentSource);
    }

    /** @test */
    public function should_get_payment_source()
    {
        $paymentSource = $this->client->paymentSource();

        $this->assertInstanceOf(PaymentSource::class, $paymentSource);
    }

    /** @test */
    public function should_get_plan()
    {
        $plan = $this->client->plan();

        $this->assertInstanceOf(Plan::class, $plan);
    }

    /** @test */
    public function should_get_portal_session()
    {
        $portalSession = $this->client->portalSession();

        $this->assertInstanceOf(PortalSession::class, $portalSession);
    }

    /** @test */
    public function should_get_promotional_credit()
    {
        $promotionalCredit = $this->client->promotionalCredit();

        $this->assertInstanceOf(PromotionalCredit::class, $promotionalCredit);
    }

    /** @test */
    public function should_get_site_migration_detail()
    {
        $siteMigrationDetail = $this->client->siteMigrationDetail();

        $this->assertInstanceOf(SiteMigrationDetail::class, $siteMigrationDetail);
    }

    /** @test */
    public function should_get_time_machine()
    {
        $timeMachine = $this->client->timeMachine();

        $this->assertInstanceOf(TimeMachine::class, $timeMachine);
    }

    /** @test */
    public function should_get_transaction()
    {
        $transaction = $this->client->transaction();

        $this->assertInstanceOf(Transaction::class, $transaction);
    }

    /** @test */
    public function should_get_unbilled_charge()
    {
        $unbilledCharge = $this->client->unbilledCharge();

        $this->assertInstanceOf(UnbilledCharge::class, $unbilledCharge);
    }

    /** @test */
    public function should_get_virtual_bank_account()
    {
        $virtualBankAccount = $this->client->virtualBankAccount();

        $this->assertInstanceOf(VirtualBankAccount::class, $virtualBankAccount);
    }
}
