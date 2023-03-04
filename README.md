# API Client for Webflow's REST API

[![Latest Version](https://img.shields.io/packagist/v/koalati/webflow-api-client?style=flat-square)](https://github.com/koalatiapp/webflow-api-client/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/github/actions/workflow/status/koalatiapp/webflow-api-client/ci.yml?style=flat-square)](https://github.com/koalatiapp/webflow-api-client/actions/workflows/ci.yml)
[![Latest real-life test](https://img.shields.io/github/actions/workflow/status/koalatiapp/webflow-api-client/real-life-test.yml?style=flat-square&label=Live%20API%20test&logo=webflow)](https://github.com/koalatiapp/webflow-api-client/actions/workflows/real-life-test.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/koalati/webflow-api-client.svg?style=flat-square)](https://packagist.org/packages/koalati/webflow-api-client)

This package provides an API client for [Webflow's REST API](https://developers.webflow.com/reference).

## Work in progress

This package is still in the works.

The following issues must be completed before the API client can be considered complete and ready:

- [X] ~~[#1 feat: add models and module for CMS collections](https://github.com/koalatiapp/webflow-api-client/issues/1)~~
- [ ] [#2 feat: add models and module for ecommerce](https://github.com/koalatiapp/webflow-api-client/issues/2)
- [X] ~~[#3 feat: add models and module for sites](https://github.com/koalatiapp/webflow-api-client/issues/3)~~
- [X] ~~[#4 feat: add models and module for membership](https://github.com/koalatiapp/webflow-api-client/issues/4)~~

If you would like to help, check out the [Contributing](#contributing) section below, pick an issue and submit a pull request for it!


## Requirements

This package requires PHP `8.1` or above.


## Installation

To install, use composer:

```
composer require koalati/webflow-api-client
```

## Getting started

### 1. Authenticate with Webflow

To quote [Webflow's authentication documentation](https://developers.webflow.com/docs/authentication):

> To access the API, you will need to provide an `access_token` to authenticate with Webflow. You can acquire that token in one of two ways.
> - Utilize OAuth to allow your application’s users to authorize your app to access their Webflow account and data. [...]
> - Issue a Site API Token that grants your application full access to your personal account. [Check out our guide on Site API Tokens](https://developers.webflow.com/docs/access-token).

**We recommend you opt for OAuth authentication.** To set up the OAuth flow, we suggest you use our [`koalati/oauth2-webflow`](https://github.com/koalatiapp/oauth2-webflow) package.

If you prefer to use Webflow's Site API Token instead, follow the steps on their documentation page that is linked above to get your access token. Please note that you will likely get a more limited access to the API if you chose to go with the Site API Token.

Either way, make sure keep all access tokens secure (e.g. store them in an encrypted format).

### 2. Instanciate the API client with your access token

```php
<?php

use Koalati\Webflow\Api\Client;

// Fetch your access token 
// @TODO: change this to get the token from where you stored it.
$accessToken = getenv("WEBFLOW_API_ACCESS_TOKEN");

// Instanciate the API client
$client = new Client($accessToken);
```

### 3. Start interacting with the API!

```php
// Fetch the list of sites
$sites = $client->listSites();

// Fetch a specific site
$siteId = "6114382d5af6775b0abebe2c";
$specificSite = $client->getSite($siteId);

// Publish a site
$client->publishSite($siteId);

// List all collections for a site
$collections = $client->listCollections($siteId);

// Fetch and iterate over collection items
$items = $client->listCollectionItems($collections[0]);
foreach ($items as $item) {
	echo $item->name . "\n";
}
```


### If you interact with a single website...

If you interact with a single Webflow site, you can use the `SiteClient` 
instead of the basic `Client` to make your code a bit cleaner.

Both clients offer the exact same feature (`Client` is actually used internally
by the `SiteClient`), but it saves you from having to pass the site ID with 
every call.

Here is an example:

```php
<?php

use Koalati\Webflow\Api\SiteClient;

// Fetch your access token 
// @TODO: change this to get the token from where you stored it.
$accessToken = getenv("WEBFLOW_API_ACCESS_TOKEN");

// Instanciate the API client
$client = new SiteClient($accessToken, "your-site-id");

$domains = $client->listDomains();
$collections = $client->listCollections();
// etc...
```

## Usage

### Pagination

Endpoints that are paginated will return a `PaginatedList` instance. This will 
prevent you from making more API calls than you really need to.

The first page of results is always fetched to begin with. As you loop over the
list, additional API calls will be made to load more data only when you 
actually get to that point. 

```php
$items = $client->listCollectionItems('somecollectionid');

foreach ($items as $item) {
	// The first 100 items are already loaded.
	// Once you reach the 101st item, an API call will be made automatically to load the next batch.
	// Same thing one you reach the 201st item, and so on and so forth.
}
```

If you prefer to fetch all of the data at the beginning, you can use the 
`PaginatedList::fetchAll()` method, which loads all of the data and returns it
as an array.

Ex.:

```php
$itemList = $client->listCollectionItems('somecollectionid');
$itemsArray = $itemList->fetchAll();

var_dump($itemsArray);
// array(561) { 
//	[0]=> object(Koalati\Webflow\Model\CollectionItem)#1 (13) { ... } }
//	[1]=> object(Koalati\Webflow\Model\CollectionItem)#2 (13) { ... } }
//  ...
//	[559]=> object(Koalati\Webflow\Model\CollectionItem)#560 (13) { ... } }
//	[560]=> object(Koalati\Webflow\Model\CollectionItem)#561 (13) { ... } }
// }
```

### Updating data

Models that can be updated via the API, such as Collection Items and Users, 
track their own changes: all you have to do to update them via their model 
instance and call their update endpoint with the model once you're ready.

Ex.:
```php
$item = $client->getCollectionItem('somecollectionid', 'someitemid');

// Update the data on the model
$item->setFieldValue('name', 'My Updated Item Name');
$item->setFieldValue('some-custom-field', 'Another update value');

// Make the API call - changes you made will be automatically detected and sent
$updatedItem = $client->updateCollectionItem('somecollectionid', $item);

// $updatedItem now holds the updated version of the item, as returned by Webflow's API.
```


## Contributing

Please see [CONTRIBUTING](https://github.com/koalatiapp/webflow-api-client/blob/main/CONTRIBUTING.md) for details.


## Credits

The core of this package was developed by [Koalati](https://www.koalati.com/), 
a QA platform for web developers and agencies.

Check out other contributors who helped maintain and make this package better: [All Contributors](https://github.com/koalatiapp/webflow-api-client/contributors).


## License

The MIT License (MIT). Please see [License File](https://github.com/koalatiapp/webflow-api-client/blob/main/LICENSE) for more information.
