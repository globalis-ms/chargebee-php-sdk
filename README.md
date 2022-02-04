# chargebee-php-sdk

Overview
------------

This package provides an API client for [Chargebee](https://www.chargebee.com/) subscription management services.

It connects to Chargebee REST APIs for following versions:
- **Chargebee API :** version 2 ([see official API documentation](https://apidocs.chargebee.com/docs/api?prod_cat_ver=2))
- **Product Catalog:** version 2.0 ([see official API documentation](https://apidocs.chargebee.com/docs/api?prod_cat_ver=2))

If your Chargebee site is using Product Catalog version 1.0, you can use our [product_catalog_v1 branch](https://github.com/globalis-ms/chargebee-php-sdk/tree/product_catalog_v1). It works mostly the same, but be aware that it is neither maintained or documented.

Installation
------------

```bash
composer composer require globalis/chargebee-php-sdk php-http/guzzle7-adapter
```

Basic usage
------------

```php
<?php

use Globalis\Chargebee\Client as ChargebeeClient;
use Http\Client\Exception\HttpException;

$chargebee = new ChargebeeClient('{site}', '{site_api_key}');

try {
    // List last created subscription:
    $response = $chargebee->subscription()->list([
        "limit" => 1,
        "sort_by[desc]" => "created_at",
        "status[is]" => "active",
    ]);
} catch (HttpException $e) {
    // Get API error details:
    $response = json_decode($e->getResponse()->getBody(), true);
    echo sprintf("Error: (%s) %s", $response["api_error_code"], $response["message"]);
}
```

Events
------------

The API client produces events on API responses. You can listen to those events and connect any callable on them.

The events implement **Psr\EventDispatcher\StoppableEventInterface** from [league/event](https://github.com/thephpleague/event) PSR-14 package.

```php
<?php

use Globalis\Chargebee\Client as Chargebee;
use Globalis\Chargebee\Events\EventChargebeeApiResponseSuccess as EventResponseSuccess;
use Globalis\Chargebee\Events\EventChargebeeApiResponseError as EventResponseError;

Chargebee::onApiResponseSuccess(function (EventResponseSuccess $event) {
    // $event contains data about the API request and response
    // do something
});

Chargebee::onApiResponseError(function (EventResponseError $event) {
    // $event contains data about the API request and response
    // do something
});
```

Integrations
------------

- WordPress: [globalis/chargebee-php-sdk-wp](https://github.com/globalis-ms/chargebee-php-sdk-wp) converts PSR-14 events into WordPress hooks and connects to [query-monitor](https://github.com/johnbillion/query-monitor) to debug your API requests.

History
------------

This project is a fork of [nathandunn/chargebee-php-sdk](https://github.com/nthndnn/chargebee-php-sdk) package. We forked it so we could implement [Product Catalog 2.0 changes](https://apidocs.chargebee.com/docs/api/upgrade?prod_cat_ver=2). We also added PSR-14 events, and fixed a few bugs.

Documentation
------------

We don't have a full documentation yet.

You will find more details on the usage of [HTTPlug](http://httplug.io) and the HttpClient\Builder on the original [README.md](https://github.com/nthndnn/chargebee-php-sdk/blob/master/README.md) and [wiki](https://github.com/nthndnn/chargebee-php-sdk/wiki/The-Builder-Object).
