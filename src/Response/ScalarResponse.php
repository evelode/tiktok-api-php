<?php
namespace TikTokRESTAPI\Response;

/**
 * Scalar account payload; linked-account success schemas remain unverified.
 * @method string|array|null getTiktok()
 */
class ScalarResponse extends APIResponse
{
    const JSON_PROPERTY_MAP = ['tiktok' => ''];
}
