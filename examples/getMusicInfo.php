<?php
/**
 * Get music info by URL or ID.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_music_info.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicInfo([
    'query' => '6928004115846924290',
]);
exampleCheck($response);

$payload = $response->getTiktok(); // TikTok model extends LazyJsonMapper.
echo 'API status: ', $response->getStatus(), PHP_EOL;
echo 'TikTok status: ', $payload?->getStatusCode() ?? 'not supplied', PHP_EOL;
// This endpoint has no dedicated nested schema in the SDK yet.
// Export its payload explicitly instead of guessing getters or model types.
exampleJson($payload);

exampleOutput($response); // Optional full JSON: --output=response.json
