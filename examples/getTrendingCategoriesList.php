<?php
/**
 * Get trending categories list.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_trending_categories_list.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getTrendingCategoriesList([
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getCategoryList() ?? [] as $category) {
    echo 'Category type: ', $category->getCategoryType(), PHP_EOL;
    echo '#', $category->getChallengeInfo()?->getChaName(), ' — ', $category->getDesc(), PHP_EOL;
    foreach ($category->getAwemeList() ?? [] as $video) echo 'Video: ', $video->getAwemeId(), PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
