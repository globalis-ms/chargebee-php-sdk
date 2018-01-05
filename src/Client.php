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
use NathanDunn\Chargebee\Api\HostedPages\HostedPage;
use NathanDunn\Chargebee\Api\Invoices\Invoice;
use NathanDunn\Chargebee\Api\Orders\Order;
use NathanDunn\Chargebee\Api\PaymentSources\PaymentSource;
use NathanDunn\Chargebee\Api\Plans\Plan;
use NathanDunn\Chargebee\Api\PortalSessions\PortalSession;
use NathanDunn\Chargebee\Api\PromotionalCredits\PromotionalCredit;
use NathanDunn\Chargebee\Api\SiteMigrationDetails\SiteMigrationDetail;
use NathanDunn\Chargebee\Api\Subscriptions\Subscription;
use NathanDunn\Chargebee\Api\TimeMachines\TimeMachine;
use NathanDunn\Chargebee\Api\Transactions\Transaction;
use NathanDunn\Chargebee\Api\UnbilledCharges\UnbilledCharge;
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
    public $baseUrl = 'https://{site}.chargebee.com/api/{version}/';

    /**
     * @var Builder
     */
    public $httpClientBuilder;

    /**
     * @var string
     */
    private $key;

    /**
     * @param string       $site
     * @param string       $key
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
        $baseUrl = str_replace('{version}', self::VERSION, $this->baseUrl);

        $this->baseUrl = str_replace('{site}', $site, $baseUrl);

        return $this;
    }

    /**
     * @return Addon
     */
    public function addon()
    {
        return new Addon($this);
    }

    /**
     * @return Address
     */
    public function address()
    {
        return new Address($this);
    }

    /**
     * @return Card
     */
    public function card()
    {
        return new Card($this);
    }

    /**
     * @return Coupon
     */
    public function coupon()
    {
        return new Coupon($this);
    }

    /**
     * @return CouponCode
     */
    public function couponCode()
    {
        return new CouponCode($this);
    }

    /**
     * @return CouponSet
     */
    public function couponSet()
    {
        return new CouponSet($this);
    }

    /**
     * @return CreditNote
     */
    public function creditNote()
    {
        return new CreditNote($this);
    }

    /**
     * @return Customer
     */
    public function customer()
    {
        return new Customer($this);
    }

    /**
     * @return Event
     */
    public function event()
    {
        return new Event($this);
    }

    /**
     * @return Estimate
     */
    public function estimate()
    {
        return new Estimate($this);
    }

    /**
     * @return HostedPage
     */
    public function hostedPage()
    {
        return new HostedPage($this);
    }

    /**
     * @return Invoice
     */
    public function invoice()
    {
        return new Invoice($this);
    }

    /**
     * @return Order
     */
    public function order()
    {
        return new Order($this);
    }

    /**
     * @return PaymentSource
     */
    public function paymentSource()
    {
        return new PaymentSource($this);
    }

    /**
     * @return Plan
     */
    public function plan()
    {
        return new Plan($this);
    }

    /**
     * @return PortalSession
     */
    public function portalSession()
    {
        return new PortalSession($this);
    }

    /**
     * @return PromotionalCredit
     */
    public function promotionalCredit()
    {
        return new PromotionalCredit($this);
    }

    /**
     * @return SiteMigrationDetail
     */
    public function siteMigrationDetail()
    {
        return new SiteMigrationDetail($this);
    }

    /**
     * @return Subscription
     */
    public function subscription()
    {
        return new Subscription($this);
    }

    /**
     * @return TimeMachine
     */
    public function timeMachine()
    {
        return new TimeMachine($this);
    }

    /**
     * @return Transaction
     */
    public function transaction()
    {
        return new Transaction($this);
    }

    /**
     * @return UnbilledCharge
     */
    public function unbilledCharge()
    {
        return new UnbilledCharge($this);
    }
}
