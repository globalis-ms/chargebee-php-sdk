<?php

namespace NathanDunn\Chargebee;

use Http\Client\Common\HttpMethodsClient;
use Http\Message\RequestFactory;
use Http\Message\StreamFactory;
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
use NathanDunn\Chargebee\HttpClient\Builder;

class Client
{
    /**
     * @var string
     */
    const VERSION = 'v2';

    /**
     * @var string
     */
    public $baseUrl = 'https://%s.chargebee.com/api/%s/';

    /**
     * @var Builder
     */
    public $httpClientBuilder;

    /**
     * @var string
     */
    private $key;

    /**
     * @param string $site
     * @param string $key
     * @param Builder|null $httpClientBuilder
     */
    public function __construct(string $site, string $key, Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder($key);
        $this->key = $key;
        $this->setBaseUrl($site);
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient(): HttpMethodsClient
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    /**
     * @return RequestFactory
     */
    public function getRequestFactory(): RequestFactory
    {
        return $this->httpClientBuilder->getRequestFactory();
    }

    /**
     * @return StreamFactory
     */
    public function getStreamFactory(): StreamFactory
    {
        return $this->httpClientBuilder->getStreamFactory();
    }

    /**
     * @param $site
     *
     * @return Client
     */
    protected function setBaseUrl($site): self
    {
        $this->baseUrl = sprintf($this->baseUrl, $site, self::VERSION);

        return $this;
    }

    /**
     * @return Addon
     */
    public function addon(): Addon
    {
        return new Addon($this);
    }

    /**
     * @return Address
     */
    public function address(): Address
    {
        return new Address($this);
    }

    /**
     * @return Card
     */
    public function card(): Card
    {
        return new Card($this);
    }

    /**
     * @return Coupon
     */
    public function coupon(): Coupon
    {
        return new Coupon($this);
    }

    /**
     * @return CouponCode
     */
    public function couponCode(): CouponCode
    {
        return new CouponCode($this);
    }

    /**
     * @return CouponSet
     */
    public function couponSet(): CouponSet
    {
        return new CouponSet($this);
    }

    /**
     * @return CreditNote
     */
    public function creditNote(): CreditNote
    {
        return new CreditNote($this);
    }

    /**
     * @return Customer
     */
    public function customer(): Customer
    {
        return new Customer($this);
    }

    /**
     * @return Estimate
     */
    public function estimate(): Estimate
    {
        return new Estimate($this);
    }

    /**
     * @return Event
     */
    public function event(): Event
    {
        return new Event($this);
    }

    /**
     * @return Export
     */
    public function export(): Export
    {
        return new Export($this);
    }

    /**
     * @return HostedPage
     */
    public function hostedPage(): HostedPage
    {
        return new HostedPage($this);
    }

    /**
     * @return Invoice
     */
    public function invoice(): Invoice
    {
        return new Invoice($this);
    }

    /**
     * @return Order
     */
    public function order(): Order
    {
        return new Order($this);
    }

    /**
     * @return PaymentIntent
     */
    public function paymentIntent(): PaymentIntent
    {
        return new PaymentIntent($this);
    }

    /**
     * @return PaymentSource
     */
    public function paymentSource(): PaymentSource
    {
        return new PaymentSource($this);
    }

    /**
     * @return Plan
     */
    public function plan(): Plan
    {
        return new Plan($this);
    }

    /**
     * @return PortalSession
     */
    public function portalSession(): PortalSession
    {
        return new PortalSession($this);
    }

    /**
     * @return PromotionalCredit
     */
    public function promotionalCredit(): PromotionalCredit
    {
        return new PromotionalCredit($this);
    }

    /**
     * @return SiteMigrationDetail
     */
    public function siteMigrationDetail(): SiteMigrationDetail
    {
        return new SiteMigrationDetail($this);
    }

    /**
     * @return Subscription
     */
    public function subscription(): Subscription
    {
        return new Subscription($this);
    }

    /**
     * @return TimeMachine
     */
    public function timeMachine(): TimeMachine
    {
        return new TimeMachine($this);
    }

    /**
     * @return Transaction
     */
    public function transaction(): Transaction
    {
        return new Transaction($this);
    }

    /**
     * @return UnbilledCharge
     */
    public function unbilledCharge(): UnbilledCharge
    {
        return new UnbilledCharge($this);
    }

    /**
     * @return VirtualBankAccount
     */
    public function virtualBankAccount(): VirtualBankAccount
    {
        return new VirtualBankAccount($this);
    }
}
