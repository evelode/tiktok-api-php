<?php
/**
 * Get YouTube channel info by profile URL, nickname or TikTok user ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_youtube_channel.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getYoutubeChannel([
    'query' => 'egorkreed',
]);
exampleCheck($response);

// No success sample exists in Postman. The real therock probe returned HTTP 404.
// exampleCheck() handles its status=fail envelope; do not invent a success schema.
$value = $response->getTiktok();
if (is_string($value)) echo 'Linked account: ', $value, PHP_EOL;
elseif (is_array($value)) echo json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR), PHP_EOL;
else echo 'No linked account returned for this profile.', PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
