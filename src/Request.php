<?php

namespace TikTokRESTAPI;

use TikTokRESTAPI\Exception\TikTokException;
use TikTokRESTAPI\Exception\NetworkException;
use TikTokRESTAPI\Exception\BadRequestException;
use TikTokRESTAPI\Exception\ForbiddenException;
use TikTokRESTAPI\Exception\NotFoundException;
use TikTokRESTAPI\Exception\ProxyAuthException;
use TikTokRESTAPI\Exception\TooManyRequestsException;
use LazyJsonMapper\Exception\LazyJsonMapperException;

/**
 * Bridge between client calls and TikTok REST API, the object mapper & response objects.
 */
class Request
{
    /**
     * API Base url
     * @var string
     */
    const API_BASE = "https://tiktok.evelode.com/tiktok-api/";

    /**
     * The TikTok class instance we belong to.
     *
     * @var TikTokRESTAPI\TikTok
     */
    protected $_parent;

    /**
     * Endpoint URL (absolute or relative) for this request.
     *
     * @var string
     */
    protected $_endpoint = '';

    /**
     * An array of query params.
     *
     * @var array
     */
    protected $_params = [];

    /**
     * An array of POST params.
     *
     * @var array
     */
    protected $_posts = [];

    /**
     * An array of HTTP headers to add to the request.
     *
     * @var string[]
     */
    protected $_headers = [];

    /**
     * Request encoding of the request.
     * 
     * @var string
     */
    protected $_encoding = 'json';

    /**
     * Get RAW response or not
     * 
     * @var bool
     */
    protected $_getRaw = false;

    /**
     * Constructor.
     *
     * @param TikTokRESTAPI\TikTok    $parent
     * @param string                    $url
     */
    public function __construct(
        $parent,
        $endpoint)
    {
        $this->_parent = $parent;
        $this->_endpoint = $endpoint;
        $this->_params['cache_timeout'] = $parent->cache_timeout;
    }

    /**
     * Add query param to request, overwriting any previous value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return self
     */
    public function addParam(
        $key,
        $value)
    {
        if ($value === true) {
            $value = 'true';
        } elseif ($value === false) {
            $value = 'false';
        }
        $this->_params[$key] = $value;

        return $this;
    }

    /**
     * Get query param of request.
     *
     * @return array
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * Add POST param to request, overwriting any previous value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return self
     */
    public function addPost(
        $key,
        $value)
    {
        if ($value === true) {
            $value = 'true';
        } elseif ($value === false) {
            $value = 'false';
        }
        $this->_posts[$key] = $value;

        return $this;
    }

    /**
     * Get POST param of request.
     *
     * @return array
     */
    public function getPosts()
    {
        return $this->_posts;
    }

    /**
     * Add custom header to request, overwriting any previous or default value.
     *
     * @param string $key
     * @param string $value
     *
     * @return self
     */
    public function addHeader(
        $key,
        $value)
    {
        $this->_headers[$key] = $value;

        return $this;
    }

    /**
     * Get header of request.
     * 
     * @param string $key
     *
     * @return mixed
     */
    public function getHeader(
        $key)
    {
        if (!empty($this->_headers[$key])) {
            return $this->_headers[$key];
        }
        return false;
    }

    /**
     * Checks is header is added.
     * 
     * @param string $key
     *
     * @return bool
     */
    public function hasHeader(
        $key)
    {
        if (isset($this->_headers[$key])) {
            return true;
        }
        return false;
    }

    /**
     * Get all headers of request.
     * 
     * @param bool $keyValueArray
     *
     * @return mixed
     */
    public function getHeaders(
        $keyValueArray = false)
    {
        if ($keyValueArray === false) {
            $headers = [];
            foreach ($this->_headers as $key => $value) {
                $headers[] = sprintf('%s: %s', $key, $value);
            }

            return $headers;
        } else {
            return $this->_headers;
        }
    }

    /**
     * Set encoding of the request.
     * 
     * @param string $encoding Request encoding type.
     * 
     * @return self
     */
    public function setEncoding(
        $encoding)
    {
        $this->_encoding = $encoding;

        return $this;
    }

    /**
     * Get encoding of the request.
     * 
     * @return string
     */
    public function getEncoding()
    {
        return $this->_encoding;
    }

    /**
     * Get raw response of the request.
     * 
     * @param bool $bool 
     * 
     * @return self
     */
    public function getRaw(
        $bool = false)
    {
        $this->_getRaw = (bool) $bool;

        return $this;
    }

    /**
     * Is response is RAW response or not
     * 
     * @return bool
     */
    public function isGetRaw()
    {
        return $this->_getRaw;
    }

    /**
     * Get request URL.
     * 
     * @return string
     */
    public function getUrl()
    {
        if (strncmp($this->_endpoint, 'http:', 5) !== 0 && strncmp($this->_endpoint, 'https:', 6) !== 0) {
            return self::API_BASE . $this->_endpoint;
        } 
        return $this->_endpoint;
    }

    /**
     * Get request body
     * 
     * @return mixed
     */
    public function getBody()
    {
        if ($this->getEncoding() === 'json') {
            return json_encode($this->getPosts());
        } elseif ($this->getEncoding() === 'urlencode') {
            return http_build_query($this->getPosts());
        } else {
            return null;
        }
    }

    /**
     * Return safely JSON-decoded HTTP response.
     * 
     * This uses a special decoder which handles 64-bit numbers correctly.
     *
     * @param bool $assoc When FALSE, decode to object instead of associative array.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return mixed
     */
    public function getResponse()
    {
        $curl_options = [];

        if ($this->getParams() !== null) {
            $url = $this->getUrl().'?'.urldecode(http_build_query($this->getParams()));
        } else {
            $url = $this->getUrl();
        }

        if ($this->getPosts() !== null) {
            if ($this->getEncoding() === 'json') {
                $this->addHeader('content-type', 'application/json; charset=utf-8');
            } else {
                $this->addHeader('content-type', 'application/x-www-form-urlencoded; charset=utf-8');
            }
            $curl_options[CURLOPT_POST] = true;
            $curl_options[CURLOPT_HTTPHEADER] = $this->getHeaders();
            $curl_options[CURLOPT_POSTFIELDS] = $this->getBody();
            $method = "POST";
        } else { 
            $curl_options[CURLOPT_HTTPHEADER] = $this->getHeaders();
            $method = "GET";
        }

        $curl_options[CURLOPT_HEADER] = false;
        $curl_options[CURLOPT_ENCODING] = 'gzip';
        $curl_options[CURLOPT_RETURNTRANSFER] = true;
        $curl_options[CURLOPT_SSL_VERIFYHOST] = false;
        $curl_options[CURLOPT_SSL_VERIFYPEER] = false;

        // Make http client work with HTTP 2/0
        $curl_options[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_2_0;
        $curl_options[CURLOPT_SSLVERSION] = 1;

        $request_options = [
            "debug"   => false,
            "verify"  => file_exists('/etc/ssl/certs/cacert.pem') ? '/etc/ssl/certs/cacert.pem' : false,
            "timeout" => 30,
            'decode_content'  => true, // Decode gzip/deflate/etc HTTP responses.
            "curl"    => $curl_options,
            // Tells Guzzle to stop throwing exceptions on non-"2xx" HTTP codes,
            // thus ensuring that it only triggers exceptions on socket errors!
            // We'll instead MANUALLY be throwing on certain other HTTP codes.
            'http_errors'     => false
        ];

        // Request debug output
        if ($this->_parent->debug === true) {
            $this->pre_debug();
        }

        // Perform the request to API server
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, $url, $request_options);
        } catch (\Exception $e) {
            // Re-wrap Guzzle's exception using our own NetworkException.
            throw new NetworkException($e);
        }

        // Response debug output 
        if ($this->_parent->debug === true) {
            $this->post_debug($response);
        }

        // Get RAW response body
        $rawResponse = (string) $response->getBody();

        // Attempt to decode the raw JSON to an array
        $json = $this->api_body_decode($rawResponse, true);

        // Detect HTTP status codes in the response
        $httpCode = $response->getStatusCode();

        // Trying to identify message in response
        $message = null;
        if (!empty($json['message'])) {
            $message = $json['message'];
        }

        // Iterate in HTTP status codes and throw correct exception
        switch ($httpCode) {
            case 200: // Request performed successfully.
                break;
            case 400: // Request not performed because some data is missing or incorrect.
                if (!empty($message)) {
                    throw new BadRequestException($message);
                } else {
                    throw new BadRequestException("Request not performed because some data is missing or incorrect.");
                }
                break;
            case 403: // Request failed due to invalid, expired, revoked license or access to API is restricted.
                if (!empty($message)) {
                    throw new ForbiddenException($message);
                } else {
                    throw new ForbiddenException("Request failed due to invalid, expired, revoked license or access to API is restricted.");
                }
                break;
            case 404: // Requested resource doesn't exist in TikTok.
                if (!empty($message)) {
                    throw new NotFoundException($message);
                } else {
                    throw new NotFoundException("Requested resource doesn't exist in TikTok.");
                }
                break;
            case 407: // Proxy auth data is missing or incorrect.
                if (!empty($message)) {
                    throw new ProxyAuthException($message);
                } else {
                    throw new ProxyAuthException("Proxy auth data is missing or incorrect.");
                }
                break;
            case 429: // Too many requests sent to TikTok.
                if (!empty($message)) {
                    throw new TooManyRequestsException($message);
                } else {
                    throw new TooManyRequestsException("Too many requests sent to TikTok.");
                }
                break;
            default: // Other errors
                if (!empty($message)) {
                    throw new TikTokException($message);
                } else {
                    throw new TikTokException($e->getMessage());
                }
                break;
        }

        if ($this->isGetRaw()) {
            return $rawResponse;
        } 

        return $json;
    }

    /**
     * Print request, if debug mode is enabled
     */
    public function pre_debug()
    {
        echo "\033[1;35;m[REQUEST]\n";

        $method = $this->getPosts() === null ? 'GET' : 'POST';
        if ($this->getParams() !== null) {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$this->getUrl().'?'.urldecode(http_build_query($this->getParams()))."\n";
        } else {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$this->getUrl()."\n";
        }

        echo "\033[1;35;mHEADERS:\n";
        foreach ($this->getHeaders() as $index => $value) {
            echo $value . "\n";
        }

        echo "\033[1;35;mENCODING: \033[0m".$this->getEncoding()."\n";

        if ($this->getPosts() !== null) {
            echo "\033[1;35;mDATA: \033[0m".$this->getBody()."\n\n";
        }
    }

    /**
     * Print response, if debug mode is enabled
     */
    public function post_debug(
        $response)
    {
        echo "\033[1;35;m[RESPONSE]\n";
        echo "\033[1;32;mSTATUS: \033[0m".$response->getStatusCode()."\n";
        if (!empty($response->getBody())) {
            // Human-Readable Response
            $rawResponse = (string) $response->getBody();
            $json = $this->api_body_decode($rawResponse, false);
            if (is_object($json)) {
                $prettyJson = @json_encode(
                    $json,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                );
                if ($prettyJson !== false) {
                    echo "\033[1;32;mRESPONSE: \033[0m".$prettyJson."\n\n";
                } else {
                    echo "\033[1;32;mRESPONSE: \033[0m".$response->getBody()->getContents()."\n\n";
                }
            } else {
                echo "\033[1;32;mRESPONSE: \033[0m".$response->getBody()->getContents()."\n\n";
            }
        } else {
            echo "\033[1;32;mRESPONSE:\n\n";
        }
    }

    /**
     * Decode a JSON reply from TikTok's API.
     *
     * WARNING: EXTREMELY IMPORTANT! NEVER, *EVER* USE THE BASIC "json_decode"
     * ON API REPLIES! ALWAYS USE THIS METHOD INSTEAD, TO ENSURE PROPER DECODING
     * OF BIG NUMBERS! OTHERWISE YOU'LL TRUNCATE VARIOUS INSTAGRAM API FIELDS!
     *
     * @param string $json  The body (JSON string) of the API response.
     * @param bool   $assoc When FALSE, decode to object instead of associative array.
     *
     * @return object|array|null Object if assoc false, Array if assoc true,
     *                           or NULL if unable to decode JSON.
     */
    public static function api_body_decode(
        $json,
        $assoc = true)
    {
        return @json_decode($json, $assoc, 512, JSON_BIGINT_AS_STRING);
    }
}