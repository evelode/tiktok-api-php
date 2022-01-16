<?php
namespace TikTokRESTAPI;

use \TikTokRESTAPI\Exception\TikTokException;

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
     * @throws \TikTokRESTAPI\Exception\TikTokException
     */
    public function __construct(
        $licenseKey = '',
        $debug = false) 
    {
        $this->licenseKey = $licenseKey;
        $this->debug = $debug;
    }

    /**
     * Get non watermarked video url
     * 
     * @param string $video_url TikTok video URL.
     * @param string $proxy     Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     */
    public function getNoWatermarkUrl(
        $video_url = '',
        $proxy = '')
    {
        if (empty($video_url)) {
            throw new TikTokException("Empty video URL.");
        }

        $request = $this->request('getNoWatermarkUrl')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_url', $video_url);
        
        if (!empty($proxy)) {
            $request->addParam('proxy', $proxy);
        }

        $response = $request->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get non watermarked video url by video ID
     * 
     * @param string $video_id  TikTok video ID.
     * @param string $proxy     Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     */
    public function getNoWatermarkUrlByID(
        $video_id = '',
        $proxy = '')
    {
        if (empty($video_id)) {
            throw new TikTokException("Empty video ID.");
        }

        $request = $this->request('getNoWatermarkUrlByID')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_id', $video_id);
        
        if (!empty($proxy)) {
            $request->addParam('proxy', $proxy);
        }

        $response = $request->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get video info by ID
     * 
     * @param string $video_id  TikTok video ID.
     * @param string $proxy     Your own proxy in for this request, this helps prevent your IP from getting banned. Proxy should match following pattern: http://ip:port OR http://username:password@ip:port.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     */
    public function getVideoByID(
        $video_id = '',
        $proxy = '')
    {
        if (empty($video_id)) {
            throw new TikTokException("Empty video ID.");
        }

        $request = $this->request('getVideoByID')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_id', $video_id);

        if (!empty($proxy)) {
            $request->addParam('proxy', $proxy);
        }

        $response = $request->getResponse();

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
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     *
     * @return \TikTokRESTAPI\Request
     */
    public function request(
        $endpoint = '')
    {
        return new Request($this, $endpoint);
    }
}