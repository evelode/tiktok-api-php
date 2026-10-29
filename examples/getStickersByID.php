<?php
/**
 * Get effect information by IDs.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_stickers_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getStickersByID([
    'sticker_ids' => '1108584,
    1108584',
]);
exampleCheck($response);

foreach ($response->getTiktok()?->getStickerInfos() ?? [] as $effect) {
    echo $effect->getId(), ' — ', $effect->getName(), PHP_EOL;
    echo 'Creator: ', $effect->getOwnerNickname(), PHP_EOL;
    echo 'Uses: ', $effect->getUserCount() ?? 0, PHP_EOL;
}

exampleOutput($response); // Optional full JSON: --output=response.json
