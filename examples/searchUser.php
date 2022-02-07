<?php

require __DIR__.'/vendor/autoload.php';

// API Configuration
$debug      = false;        // Debug mode
$licenseKey = '';           // Your own unique license key, which can be purchased here (https://nextpost.tech/downloads/tiktok-rest-api/)

// Request parameters
$keyword  = '';             // Any text or keyword.

// Initialize TikTok REST API class
$tiktok = new \TikTokRESTAPI\TikTok($licenseKey, $debug);

// By default we use caching system with 3600 seconds window to speed up similar requests to API. 
// If you want to disable caching, you can set 0 here.
$tiktok->setCacheTimeout(3600);

try {
    if (empty($keyword)) {
        getKeyword:
        // Any text or keyword.
        // This is an example how to get $keyword from Console/Terminal
        echo 'Enter the text or keyword to search:';
        $keyword = trim(fgets(STDIN));
    }

    search:
    $resp = $tiktok->searchUser($keyword);

    if ($resp->isOk() && $resp->isTiktok() && count($resp->getTiktok()->getUserList()) > 0) {

        $user_list = $resp->getTiktok()->getUserList();
        echo sprintf('Users found by keyword "%s":', $keyword) . "\n";

        foreach ($user_list as $key => $user) {

            $nickname = $user->getUserInfo()->getUniqueId();
            $fullname = $user->getUserInfo()->getNickname();
            $inst_id = $user->getUserInfo()->getInsId();

            if (!empty($inst_id)) {
                echo sprintf('@%s (%s) | Instagram @%s', $nickname, $fullname, $inst_id) . "\n";
            } else {
                echo sprintf('@%s (%s)', $nickname, $fullname) . "\n";
            }
        }
    } else {
        echo sprintf('Users by keyword "%s" not found.', $keyword) . "\n";
    }

    echo 'Do you want to use search again?' . "\n";
    echo '1 - Yes' . "\n";
    echo '2 - No' . "\n";
    echo 'Your choice:';
    $choice = trim(fgets(STDIN));
    if ($choice == 1) {
        goto getKeyword;
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

