# globalis/chargebee-php-sdk

(work in progress)

Fork of [nathandunn/chargebee-php-sdk](https://github.com/nthndnn/chargebee-php-sdk)

New features:
- Fix `findAsPdf()` broken methods using POST instead of GET
- Provide `Client::onApiResponseSuccess()` and `Client::onApiResponseError()` hooks, using [league/event](https://github.com/thephpleague/event) PSR-14 implementation
- (wip) Implement [Chargebee Product Catalog 2.0 changes](https://apidocs.chargebee.com/docs/api/upgrade?prod_cat_ver=2)

If you are a WordPress developer, try out our (not published yet) WordPress integration globalis/chargebee-php-sdk-wp :
- Automatically convert PSR-14 events into WordPress hooks/actions
- Connects to [johnbillion/query-monitor](https://github.com/johnbillion/query-monitor) to debug your API requests
