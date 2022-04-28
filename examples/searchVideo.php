<?php

require __DIR__.'/vendor/autoload.php';

// API Configuration
$debug      = false;        // Debug mode
$licenseKey = ''; // Your own unique license key, which can be purchased here (https://nextpost.tech/downloads/tiktok-rest-api/)

// Request parameters
$keyword  = '';             // Any text or keyword.

$tiktok = new \TikTokRESTAPI\TikTok($licenseKey, $debug);
try {
    if (empty($keyword)) {
        getKeyword:
        // Any text or keyword.
        // This is an example how to get $keyword from Console/Terminal
        echo 'Enter the text or keyword to search:';
        $keyword = trim(fgets(STDIN));
    }

    search:
    $resp = $tiktok->searchVideo($keyword, 30);

    if ($resp->isOk() && $resp->isTiktok() && count($resp->getTiktok()->getAwemeList()) > 0) {

        echo sprintf('Videos found by keyword "%s":', $keyword) . "\n";

        $video_list = $resp->getTiktok()->getAwemeList();

        foreach ($video_list as $key => $video) {

            $aweme_id = $video->getAwemeId();
            $nickname = $video->getAuthor()->getUniqueId();
            $fullname = $video->getAuthor()->getNickname();
            $inst_id = $video->getAuthor()->getInsId();

            if (!empty($inst_id)) {
                echo sprintf('Video %s by @%s (%s) | Instagram @%s', 'https://www.tiktok.com/@' . $nickname . '/video/' . $aweme_id, $nickname, $fullname, $inst_id) . "\n";
            } else {
                echo sprintf('Video %s by @%s (%s)', 'https://www.tiktok.com/@' . $nickname . '/video/' . $aweme_id, $nickname, $fullname) . "\n";
            }
        }
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

