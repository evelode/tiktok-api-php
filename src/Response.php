<?php

namespace TikTokRESTAPI;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use RuntimeException;

/**
 * Response.
 *
 * @method string getMessage()
 * @method bool isMessage()
 * @method $this setMessage(string $value)
 * @method $this unsetMessage()
 */
class Response extends AutoPropertyMapper
{
    /** @var string */
    const STATUS_OK = 'ok';

    const JSON_PROPERTY_MAP = [
        /*
         * Whether the API request succeeded or not.
         *
         * Can be: "ok", "fail",...
         */
        'staus'  => 'string',
    ];

    /** @var HttpResponseInterface */
    public $httpResponse;

    /**
     * Checks if the response was successful.
     *
     * @return bool
     */
    public function isOk()
    {
        return $this->_getProperty('status') === self::STATUS_OK;
    }

    /**
     * Gets the message.
     *
     * This function overrides the normal getter with some special processing
     * to handle unusual multi-error message values in certain responses.
     *
     * @throws RuntimeException If the message object is of an unsupported type.
     *
     * @return string|null A message string if one exists, otherwise NULL.
     */
    public function getMessage()
    {
        // Example:
        // {"message":"NO_POSITION","data":{}}

        $message = $this->_getProperty('message');
        if ($message === null || is_string($message)) {
            // Single error string or nothing at all.
            return $message;
        } else {
            throw new RuntimeException('Unknown message type in response.');
        }
    }

    /**
     * Gets the HTTP response.
     *
     * @return HttpResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * Sets the HTTP response.
     *
     * @param HttpResponseInterface $response
     */
    public function setHttpResponse(
        HttpResponseInterface $response)
    {
        $this->httpResponse = $response;
    }

    /**
     * Checks if an HTTP response value exists.
     *
     * @return bool
     */
    public function isHttpResponse()
    {
        return $this->httpResponse !== null;
    }
}
