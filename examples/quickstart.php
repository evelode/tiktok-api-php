<?php
require dirname(__DIR__).'/vendor/autoload.php';

$client = new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$client->setCacheTimeout(60);
$response = $client->getUserInfo('therock');
if ($response->isOk() && $response->getTiktok()?->isUser()) {
    echo $response->getTiktok()->getUser()->getUniqueId();
}
