<?php
/**
 * Get location info by ID.
 * One request; edit the sample inputs below. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_location_info_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getLocationInfoByID([
    'location_id' => '22535796485353377',
]);
exampleCheck($response);

$payload = $response->getTiktok(); // TikTok model extends LazyJsonMapper.
echo 'API status: ', $response->getStatus(), PHP_EOL;
echo 'TikTok status: ', $payload?->getStatusCode() ?? 'not supplied', PHP_EOL;
// This endpoint has no dedicated nested schema in the SDK yet.
// Export its payload explicitly instead of guessing getters or model types.
exampleJson($payload);

exampleOutput($response); // Optional full JSON: --output=response.json
