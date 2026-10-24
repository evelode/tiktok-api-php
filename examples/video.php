<?php
require dirname(__DIR__).'/vendor/autoload.php';
$client=new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$response=$client->call('getVideoByID',['video_id'=>'7106855913906081070', 'cache_timeout'=>60]);
print_r($response->exportObjectDataCopy('array'));
