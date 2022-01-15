<?php

namespace TikTokRESTAPI\Exception;

/**
 * Used for endpoint calls that fail with HTTP code "403 Forbidden", but only
 * if no other more serious exception was found in the server response.
 */
class ForbiddenException extends TikTokException
{
}
