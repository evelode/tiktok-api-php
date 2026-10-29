<?php
/**
 * Get music charts.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_music_charts.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getMusicCharts([
]);
exampleCheck($response);

$payload = $response->getTiktok(); // TikTok model extends LazyJsonMapper.
echo 'API status: ', $response->getStatus(), PHP_EOL;
echo 'TikTok status: ', $payload?->getStatusCode() ?? 'not supplied', PHP_EOL;
// This endpoint has no dedicated nested schema in the SDK yet.
// Export its payload explicitly instead of guessing getters or model types.
exampleJson($payload);

exampleOutput($response); // Optional full JSON: --output=response.json
