<?php
/**
 * Get hashtag info by URL or tag name.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_hashtag_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getHashtagInfo([
    'query' => 'apple',
]);
exampleCheck($response);

$tag = $response->getTiktok();
echo '#', $tag?->getChaName(), ' (ID ', $tag?->getCid(), ')', PHP_EOL;
echo 'Uses: ', $tag?->getUseCount() ?? 0, PHP_EOL;
echo 'Views: ', $tag?->getViewCount() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
