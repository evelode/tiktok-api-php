<?php
require dirname(__DIR__).'/vendor/autoload.php';

$client = new TikTokRESTAPI\TikTok(getenv('JSONSCRAPER_TIKTOK_LICENSE_KEY'));
$client->setCacheTimeout(60);
$client->setTimeout(30);

try {
    $response = $client->getVideoByID('7106855913906081070');
    if (!$response->isOk() || $response->getRateLimitReached()) {
        throw new RuntimeException('The API returned an application error or rate limit');
    }
    $video = $response->getTiktok()?->getAwemeDetail();
    if (!$video) throw new RuntimeException('Video data is absent in this response');

    echo 'Video ID: ', $video->getAwemeId(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname() ?? 'unknown', PHP_EOL;
    echo 'Views: ', $video->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;
    foreach ($video->getVideo()?->getPlayAddr()?->getUrlList() ?? [] as $url) {
        echo $url, PHP_EOL;
    }
} catch (TikTokRESTAPI\Exception\TooManyRequestsException $error) {
    fwrite(STDERR, 'Rate limited: wait before making another request.' . PHP_EOL);
} catch (TikTokRESTAPI\Exception\TikTokException $error) {
    fwrite(STDERR, $error->getMessage() . PHP_EOL);
}
