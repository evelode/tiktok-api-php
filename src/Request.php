<?php

namespace TikTokRESTAPI;

/**
 * Bridge between client calls and TikTok REST API, the object mapper & response objects.
 */
class Request
{
    /**
     * API Base url
     * @var string
     */
    const API_BASE = "https://nextpost.tech/tiktok-api/";

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
     * 
     * @throws \GuzzleHttp\Exception\ConnectException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\ServerException
     * 
     * @return mixed
     */
    public function getResponse()
    {
        try {
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
                "timeout" => 10,
                "curl"    => $curl_options
            ];

            if ($this->_parent->debug === true) {
                $this->pre_debug();
            }

            $client = new \GuzzleHttp\Client();
            $response = $client->request($method, $url, $request_options);

            if ($this->_parent->debug === true) {
                $this->post_debug($response);
            }

            $rawResponse = (string) $response->getBody();

            if ($this->isGetRaw()) {
                return $rawResponse;
            }

            $json = $this->api_body_decode($rawResponse, true);

            return $json;
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            throw new \TikTokRESTAPI\Exception\NetworkException($e);
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            throw new \TikTokRESTAPI\Exception\TikTokException($e);
        } catch (\Exception $e) {
            if ($e->getCode() == 400) {
                throw new \TikTokRESTAPI\Exception\BadRequestException($e);
            } elseif ($e->getCode() == 403) {
                throw new \TikTokRESTAPI\Exception\ForbiddenException($e);
            } elseif ($e->getCode() == 404) {
                throw new \TikTokRESTAPI\Exception\NotFoundException($e);
            } elseif ($e->getCode() == 407) {
                throw new \TikTokRESTAPI\Exception\ProxyAuthException($e);
            } elseif ($e->getCode() == 429) {
                throw new \TikTokRESTAPI\Exception\TooManyRequestsException($e);
            }
            throw $e;
        }
    }

    /**
     * Print request, if debug mode is enabled
     */
    public function pre_debug()
    {
        echo "\033[1;35;m[REQUEST]\n\n";

        $method = $this->getPosts() === null ? 'GET' : 'POST';
        if ($this->getParams() !== null) {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$this->getUrl().'?'.urldecode(http_build_query($this->getParams()))."\n\n";
        } else {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$this->getUrl()."\n\n";
        }

        foreach ($this->getHeaders() as $index => $value) {
            echo $value . "\n";
        }

        echo "\n\033[1;35;mEncoding: \033[0m".$this->getEncoding()."\n\n";

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
        echo "\033[1;35;m[RESPONSE]\n\n";
        echo "\033[1;32;mSTATUS: \033[0m".$response->getStatusCode()."\n";
        if (!empty($response->getBody())) {
            echo "\033[1;32;mRESPONSE: \033[0m".$response->getBody()->getContents()."\n\n";
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