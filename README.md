# TikTok REST API wrapper for PHP

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/evelode/tiktok-api-php)
![GitHub last commit](https://img.shields.io/github/last-commit/evelode/tiktok-api-php)
![GitHub](https://img.shields.io/github/license/evelode/tiktok-api-php)

Easy to use [TikTok REST API](https://evelode.com/downloads/tiktok-rest-api/). Get TikTok public user data, feed, trends, hashtags, music, and non watermarked TikTok videos.

Using our detailed multipurpose [API Documentation](https://evelode.com/tiktok-rest-api-documentation/) and following TikTok REST API wrapper for PHP you can explore and reach all TikTok REST API endpoints with ease. 

Try our [Trial license plan](https://evelode.com/downloads/tiktok-rest-api/) and test all API endpoints before buying a license.

# Navigation

- [Installation](#installation)
- [Authentication](#authentication)
- [Rate Limits](#rate-limits)
- [License](#license)
- [Support](#support)
- [Endpoints](#endpoints)
- [Examples](#examples)
    - [Video](#video)
    - [Search](#search)
    - [User](#user)
    - [Hashtag](#hashtag)
    - [Music](#music)

# Installation

If you want to install library **to exsiting project** using Composer:

```php
cd /path-to-app/
composer require evelode/tiktok-api-php
```

- `/path-to-app/` project folder with existing `composer.json` file 

If you want to install library **to new project** using Composer:

- If Composer not installed on your server/local machine, please follow this [installation guide](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04)

- Create blank file named as `composer.json` in project folder

- Add following content to this file:

```php
{
    "require": {
        "evelode/tiktok-api-php": "^1.0.0"
    }
}
```

- After that install library using the following command:

```php
cd /path-to-app/
composer update
```

- `/path-to-app/` project folder with existing `composer.json` file 

# Authentication

Authentication occurs by passing the license key value through a query string named `license_key`, which can be purchased [here](https://evelode.com/downloads/tiktok-rest-api/).

API Server Url: `https://tiktok.evelode.com/tiktok-api`

# Rate Limits

The developer `license_key` gives the right to use all methods within the TikTok REST API within the limit of requests for a specific period. Requests limit based on your license length and will be flushed when you renew or upgrade your license. Empty or invalid responses doesn't affect requests counter.

Every license plan also have a requests per minute rate limit. More info about license plans you can check [here](https://evelode.com/downloads/tiktok-rest-api/).

# License

You can buy a valid `license_key` for TikTok REST API [here](https://evelode.com/downloads/tiktok-rest-api/). This license based on period of usage and requests count.

**Demo Access**: We offer a Trial access with limited requests count, if you want to test REST API you can get license key [here](https://evelode.com/downloads/tiktok-rest-api/). Trial license can't be renewed, but can be upgraded to another licenses types.

# Support

This is a developer's portal for TikTok REST API wrapper for PHP and should not be used for support. Please [contact us via website chat](https://evelode.com/#chatraChatExpanded) if you need to submit a support request or have any question about API functionality.

# Endpoints

Using our detailed [Postman collection](https://www.postman.com/evelode/workspace/evelode/api/e2ed8e20-0dbd-41a3-9363-092d810217ed?action=share&creator=24862082) you can explore and test all TikTok REST API endpoints in real time. Try our Trial license plan and test all API endpoints before buying a license.

# Examples

## Video

- [getNoWatermarkUrl.php](/examples/getNoWatermarkUrl.php)

## Search

## User

## Hashtag

## Music