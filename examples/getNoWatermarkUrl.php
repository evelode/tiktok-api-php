<?php

require __DIR__.'/vendor/autoload.php';

// API Configuration
$debug      = false;    // Debug mode
$licenseKey = '';       // Your own unique license key, which can be purchased here (https://nextpost.tech/downloads/tiktok-rest-api/)

// Request parameters
$video_url  = '';       // TikTok video URL.

// Initialize TikTok REST API class
$tiktok = new \TikTokRESTAPI\TikTok($licenseKey, $debug);

// By default we use caching system with 3600 seconds window to speed up similar requests to API. 
// If you want to disable caching, you can set 0 here.
$tiktok->setCacheTimeout(3600);

try {
    // Validate the TikTok video URL
    // This is an example how to get $video_url from Console/Terminal
    if (empty($video_url)) {
        echo 'Enter the TikTok video URL:';
        $video_url = trim(fgets(STDIN));
    }

    $resp = $tiktok->getNoWatermarkUrl($video_url);
    if ($resp->isOk() && $resp->isTiktok()) {
        $video_url = $resp->getTiktok()->getUrl();
        if (!empty($video_url)) {
            echo sprintf('Non-watermarked Video URL: %s', $video_url) . "\n";
        }
    }
} catch (TikTokRESTAPI\Exception\BadRequestException $e) {
    // Request not performed because some data is missing or incorrect.
    echo sprintf('BadRequestException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\ForbiddenException $e) {
    // Request failed due to invalid, expired, revoked license or access to API is restricted.
    echo sprintf('ForbiddenException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\NotFoundException $e) {
    // Requested resource doesn't exist in TikTok.
    echo sprintf('NotFoundException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\ProxyAuthException $e) {
    // Proxy auth data is missing or incorrect.
    echo sprintf('ProxyAuthException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\TooManyRequestsException $e) {
    // Too many requests sent to TikTok.
    echo sprintf('TooManyRequestsException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\NetworkException $e) {
    // Couldn't establish connection with REST API server
    echo sprintf('NetworkException Catched: %s', $e->getMessage()) . "\n";
} catch (TikTokRESTAPI\Exception\TikTokException $e) {
    // Invalid argument, missing or invalid data in request
    echo sprintf('TikTokException Catched: %s', $e->getMessage()) . "\n";
} catch (Exception $e) {
    echo sprintf('Exception Catched: %s', $e->getMessage()) . "\n";
    echo var_dump($e->getTrace());
}