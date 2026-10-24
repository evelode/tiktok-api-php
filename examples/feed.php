<?php
require dirname(__DIR__).'/vendor/autoload.php';
$client=new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$response=$client->call('getUserFeed',['query'=>'therock', 'count'=>10, 'max_cursor'=>'', 'cache_timeout'=>60]);
print_r($response->exportObjectDataCopy('array'));
