<?php

namespace Globalis\Chargebee;

use Http\Client\Common\HttpMethodsClient;
use Http\Message\RequestFactory;
use Http\Message\StreamFactory;
use League\Event\EventDispatcher;
use Globalis\Chargebee\Events\EventChargebeeApiResponse as EventResponse;
use Globalis\Chargebee\Events\EventChargebeeApiResponseSuccess as EventResponseSuccess;
use Globalis\Chargebee\Events\EventChargebeeApiResponseError as EventResponseError;
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
use Globalis\Chargebee\HttpClient\Builder;

class Client
{
    /**
     * @var string
     */
    const VERSION = 'v2';

    /**
     * @var string
     */
    public $site;

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
     * @var EventDispatcher
     */
    protected static $eventDispatcher;

    /**
     * @param string       $site
     * @param string       $key
     * @param Builder|null $httpClientBuilder
     */
    public function __construct(string $site = '', string $key = '', Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder($key);
        $this->key = $key;
        $this->site = $site;
        $this->setBaseUrl($site);
    }

    public static function eventDispatcher()
    {
        if (is_null(self::$eventDispatcher)) {
            self::$eventDispatcher = new EventDispatcher();
        }

        return self::$eventDispatcher;
    }

    public static function dispatchEvent(EventResponse $event)
    {
        self::eventDispatcher()->dispatch($event);
    }

    public static function onApiResponseSuccess(callable $c)
    {
        self::eventDispatcher()->subscribeTo(EventResponseSuccess::class, $c);
    }

    public static function onApiResponseError(callable $c)
    {
        self::eventDispatcher()->subscribeTo(EventResponseError::class, $c);
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
     * @return Address
     */
    public function address(): Address
    {
        return new Address($this);
    }

    /**
     * @return AttachedItem
     */
    public function attachedItem(): AttachedItem
    {
        return new AttachedItem($this);
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
     * @return Gift
     */
    public function gift(): Gift
    {
        return new Gift($this);
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
     * @return Item
     */
    public function item(): Item
    {
        return new Item($this);
    }

    /**
     * @return ItemPrice
     */
    public function itemPrice(): ItemPrice
    {
        return new ItemPrice($this);
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
