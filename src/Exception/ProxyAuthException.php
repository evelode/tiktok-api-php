<?php

namespace TikTokRESTAPI\Exception;

/**
 * Used for endpoint calls that fail with HTTP code "407 Proxy Authentication Required", but only
 * if no other more serious exception was found in the server response.
 */
class ProxyAuthException extends TikTokException
{
}
