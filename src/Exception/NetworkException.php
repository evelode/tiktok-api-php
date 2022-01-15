<?php

namespace TikTokRESTAPI\Exception;

/**
 * Used for endpoint calls that fail with networking error, but only
 * if no other more serious exception was found in the server response.
 */
class NetworkException extends TikTokException
{
}
