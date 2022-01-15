<?php

namespace TikTokRESTAPI\Exception;

/**
 * Used for endpoint calls that fail with HTTP code "429 Too Many Requests", but only
 * if no other more serious exception was found in the server response.
 */
class TooManyRequestsException extends TikTokException
{
}
