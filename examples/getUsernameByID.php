<?php
/**
 * Get username by TikTok user ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_username_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getUsernameByID([
    'user_id' => '6745191554350760966',
]);
exampleCheck($response);

// These endpoints return tiktok as a scalar, not a user object.
$value = $response->getTiktok();
if (is_scalar($value)) echo 'Result: ', (string) $value, PHP_EOL;
else echo 'No account value returned.', PHP_EOL;
// Keep platform IDs as strings; never cast them to float.

exampleOutput($response); // Optional full JSON: --output=response.json
