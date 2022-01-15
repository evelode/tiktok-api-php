<?php
namespace NextpostTech\TikTokAPI;

/**
 * TikTok REST API wrapper for PHP
 * 
 * @version 1.0.0
 * @author Nextpost.tech (https://nextpost.tech)
 */
class TikTok
{
    /**
     * License key for authentication in REST API.
     * @var string
     */
    public $licenseKey = '';

    /**
     * Debug.
     * @var bool
     */
    public $debug = false;

    /**
     * TikTok API constructor.
     *
     * @param bool  $debug         Enables debug mode.
     * @param array $licenseKey    License key for authentication on REST API.
     * 
     * @throws \NextpostTech\TikTokAPI\Exception\TikTokException
     */
    public function __construct(
        $licenseKey = '',
        $debug = false) 
    {
        if (empty($licenseKey)) {
            throw new \NextpostTech\TikTokAPI\Exception\TikTokException("License key can't be empty.");
        }

        $this->licenseKey = $licenseKey;
        $this->debug = $debug;
    }

    /**
     * Get non watermarked video url
     * 
     * @param string $video_url TikTok video URL.
     * @param string $proxy     Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port.
     * 
     * @throws \NextpostTech\TikTokAPI\Exception\TikTokException
     * @throws \NextpostTech\TikTokAPI\Exception\BadRequestException
     * @throws \NextpostTech\TikTokAPI\Exception\ForbiddenException
     * @throws \NextpostTech\TikTokAPI\Exception\NotFoundException
     * @throws \NextpostTech\TikTokAPI\Exception\ProxyAuthException
     * @throws \NextpostTech\TikTokAPI\Exception\TooManyRequestsException
     * 
     * @throws \GuzzleHttp\Exception\ConnectException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\ServerException
     */
    public function getNoWatermarkUrl(
        $video_url = '',
        $proxy = '')
    {
        $response = $this->request('getNoWatermarkUrl')
                         ->addParam('license_key', $this->licenseKey)
                         ->addParam('video_url', $video_url)
                         ->addParam('proxy', $proxy)
                         ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Create a custom API request.
     *
     * Used internally, but can also be used by end-users if they want
     * to create completely custom API queries without modifying this library.
     *
     * @param string $endpoint
     * 
     * @throws \NextpostTech\TikTokAPI\Exception\TikTokException
     * @throws \NextpostTech\TikTokAPI\Exception\BadRequestException
     * @throws \NextpostTech\TikTokAPI\Exception\ForbiddenException
     * @throws \NextpostTech\TikTokAPI\Exception\NotFoundException
     * @throws \NextpostTech\TikTokAPI\Exception\ProxyAuthException
     * @throws \NextpostTech\TikTokAPI\Exception\TooManyRequestsException
     * 
     * @throws \GuzzleHttp\Exception\ConnectException
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \GuzzleHttp\Exception\ServerException
     *
     * @return \NextpostTech\Request
     */
    public function request(
        $endpoint = '')
    {
        return new Request($this, $endpoint);
    }
}