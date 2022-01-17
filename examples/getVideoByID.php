<?php

require __DIR__.'/vendor/autoload.php';

// API Configuration
$debug = true;    // Debug mode
$licenseKey = ''; // Your own unique license key, which can be purchased here (https://nextpost.tech/downloads/tiktok-rest-api/)

// Request parameters
$video_id  = ''; // TikTok video URL.
$proxy      = ''; // Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port. 

$tiktok = new \TikTokRESTAPI\TikTok($licenseKey, $debug);
try {
    $resp = $tiktok->getVideoByID($video_id, $proxy);
    if ($resp->isOk() && $resp->isTikTok() && $resp->isAwemeDetail()) {
        $aweme_detail = $resp->isAwemeDetail();
        if ($aweme_detail->isAuthor() && $aweme_detail->isStatistics()) {
            echo sprintf(
                'Video published by @%s (%s) and have %s likes, %s plays and %s comments.',
                $aweme_detail->getAuthor()->getUniqueId(),
                $aweme_detail->getAuthor()->getNickname(),
                number_format($aweme_detail->getStatistics()->getDiggCount(), 0 , '.' , ',' ),
                number_format($aweme_detail->getStatistics()->getPlayCount(), 0 , '.' , ',' ),
                number_format($aweme_detail->getStatistics()->getCommentCount(), 0 , '.' , ',' )
            );
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

