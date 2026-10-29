<?php
/**
 * Get story info by ID.
 * Run with --offline to inspect a real saved response, or edit inputs for one live request. LazyJsonMapper supplies the getters.
 * Full query-parameter CLI: endpoints/get_story_info_by_id.php
 */
declare(strict_types=1);

require __DIR__ . '/support/bootstrap.php';

$client = exampleClient();
// APIResponse extends LazyJsonMapper; the SDK creates it automatically.
$response = $client->getStoryInfoByID([
    'story_id' => '7620713971015798023',
]);
exampleCheck($response);

// The story detail is directly in tiktok, without an aweme_detail wrapper.
$story = $response->getTiktok();
echo 'Story: ', $story?->getAwemeId(), PHP_EOL;
echo 'Author: ', $story?->getAuthor()?->getNickname(), PHP_EOL;
echo 'Views: ', $story?->getStatistics()?->getPlayCount() ?? 0, PHP_EOL;

exampleOutput($response); // Optional full JSON: --output=response.json
