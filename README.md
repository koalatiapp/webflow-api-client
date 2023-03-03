# API Client for Webflow's REST API

[![Latest Version](https://img.shields.io/packagist/v/koalati/webflow-api-client?style=flat-square)](https://github.com/koalatiapp/webflow-api-client/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/github/actions/workflow/status/koalatiapp/webflow-api-client/ci.yml?style=flat-square)](https://github.com/koalatiapp/webflow-api-client/actions)
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

This package requires PHP `8.0` or above.


## Installation

To install, use composer:

```
composer require koalati/webflow-api-client
```

## Usage

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
```

For a complete list of available methods, check out the documentation below:

@TODO: Document all available methods and models


## Contributing

Please see [CONTRIBUTING](https://github.com/koalatiapp/webflow-api-client/blob/main/CONTRIBUTING.md) for details.


## Credits

The core of this package was developed by [Koalati](https://www.koalati.com/), 
a QA platform for web developers and agencies.

Check out other contributors who helped maintain and make this package better: [All Contributors](https://github.com/koalatiapp/webflow-api-client/contributors).


## License

The MIT License (MIT). Please see [License File](https://github.com/koalatiapp/webflow-api-client/blob/main/LICENSE) for more information.
