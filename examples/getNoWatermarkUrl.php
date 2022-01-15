<?php

require __DIR__.'/../vendor/autoload.php';

// API Configuration
$debug = true;    // Debug mode
$licenseKey = ''; // Your own unique license key, which can be purchased here (https://nextpost.tech/downloads/tiktok-rest-api/)

// Request parameters
$video_url  = ''; // TikTok video URL.
$proxy      = ''; // Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port. 

$tiktok = new \NextpostTech\TikTokAPI\TikTok($debug, $licenseKey);

try {
    $response = $tiktok->getNoWatermarkUrl($video_url, $proxy);
} catch (NextpostTech\TikTokAPI\Exception\BadRequestException $e) {
    // Request not performed because some data is missing or incorrect.
    echo sprintf('TikTok REST API BadRequestException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\ForbiddenException $e) {
    // Request failed due to invalid, expired, revoked license or access to API is restricted.
    echo sprintf('TikTok REST API ForbiddenException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\NotFoundException $e) {
    // Requested resource doesn't exist in TikTok.
    echo sprintf('TikTok REST API NotFoundException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\ProxyAuthException $e) {
    // Proxy auth data is missing or incorrect.
    echo sprintf('TikTok REST API ProxyAuthException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\TooManyRequestsException $e) {
    // Too many requests sent to TikTok.
    echo sprintf('TikTok REST API TooManyRequestsException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\NetworkException $e) {
    // Couldn't establish connection with REST API server
    echo sprintf('TikTok REST API NetworkException: %s', $e->getMessage()) . "\n\n";
} catch (NextpostTech\TikTokAPI\Exception\TikTokException $e) {
    // Invalid argument, missing or invalid data in request
    echo sprintf('TikTok REST API Exception: %s', $e->getMessage()) . "\n\n";
} catch (Exception $e) {
    echo sprintf('Oops, something went wrong: %s', $e->getMessage()) . "\n\n";
    echo var_dump($e->getTrace());
}

