<?php
/**
 * Get video info by URL.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_video_by_url.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getVideoByUrl('https://www.tiktok.com/@onerepublic/video/7141505394869898538');
exampleCheck($response);

$video = $response->getTiktok()?->getAwemeDetail(); // AwemeDetail model.
if ($video === null) {
    echo 'No video was returned.', PHP_EOL;
} else {
    echo 'Video ID: ', $video->getAwemeId(), PHP_EOL;
    echo 'Author: ', $video->getAuthor()?->getNickname() ?? 'not supplied', PHP_EOL;
    echo 'Views: ', $video->getStatistics()?->getPlayCount() ?? 'not supplied', PHP_EOL;
    foreach ($video->getVideo()?->getPlayAddr()?->getUrlList() ?? [] as $url) {
        echo $url, PHP_EOL;
    }
}

exampleOutput($response); // Optional full JSON: --output=response.json
