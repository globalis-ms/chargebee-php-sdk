<?php

namespace Tests\Unit;

use Http\Client\Common\HttpMethodsClient;
use Globalis\Chargebee\Api\Addresses\Address;
use Globalis\Chargebee\Api\AttachedItems\AttachedItem;
use Globalis\Chargebee\Api\Cards\Card;
use Globalis\Chargebee\Api\CouponCodes\CouponCode;
use Globalis\Chargebee\Api\Coupons\Coupon;
use Globalis\Chargebee\Api\CouponSets\CouponSet;
use Globalis\Chargebee\Api\CreditNotes\CreditNote;
use Globalis\Chargebee\Api\Customers\Customer;
use Globalis\Chargebee\Api\Estimates\Estimate;
use Globalis\Chargebee\Api\Events\Event;
use Globalis\Chargebee\Api\Exports\Export;
use Globalis\Chargebee\Api\Gifts\Gift;
use Globalis\Chargebee\Api\HostedPages\HostedPage;
use Globalis\Chargebee\Api\Invoices\Invoice;
use Globalis\Chargebee\Api\ItemPrices\ItemPrice;
use Globalis\Chargebee\Api\Items\Item;
use Globalis\Chargebee\Api\Orders\Order;
use Globalis\Chargebee\Api\PaymentIntents\PaymentIntent;
use Globalis\Chargebee\Api\PaymentSources\PaymentSource;
use Globalis\Chargebee\Api\PortalSessions\PortalSession;
use Globalis\Chargebee\Api\PromotionalCredits\PromotionalCredit;
use Globalis\Chargebee\Api\SiteMigrationDetails\SiteMigrationDetail;
use Globalis\Chargebee\Api\Subscriptions\Subscription;
use Globalis\Chargebee\Api\TimeMachines\TimeMachine;
use Globalis\Chargebee\Api\Transactions\Transaction;
use Globalis\Chargebee\Api\UnbilledCharges\UnbilledCharge;
use Globalis\Chargebee\Api\VirtualBankAccounts\VirtualBankAccount;
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
    public function should_get_item()
    {
        $order = $this->client->item();

        $this->assertInstanceOf(Item::class, $order);
    }

    /** @test */
    public function should_get_item_price()
    {
        $order = $this->client->itemPrice();

        $this->assertInstanceOf(ItemPrice::class, $order);
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
    public function should_get_address()
    {
        $address = $this->client->address();

        $this->assertInstanceOf(Address::class, $address);
    }

    /** @test */
    public function should_get_attached_item()
    {
        $address = $this->client->attachedItem();

        $this->assertInstanceOf(AttachedItem::class, $address);
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
    public function should_get_gift()
    {
        $gift = $this->client->gift();

        $this->assertInstanceOf(Gift::class, $gift);
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
