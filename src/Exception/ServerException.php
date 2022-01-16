<?php

namespace TikTokRESTAPI\Exception;

/**
 * Used for endpoint calls that fail with HTTP code "5XX" livel errors, but only
 * if no other more serious exception was found in the server response.
 */
class ServerException extends TikTokException
{
}
