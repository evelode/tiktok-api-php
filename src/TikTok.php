<?php
namespace TikTokRESTAPI;

use \TikTokRESTAPI\Exception\TikTokException;

/**
 * TikTok REST API wrapper for PHP
 * 
 * @version 1.0.0
 * @author Nextpost.tech (https://nextpost.tech/downloads/tiktok-rest-api/)
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
     * API cache timeout.
     * @var bool
     */
    public $cache_timeout = 3600;

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
     * Set the API cache timeout
     * 
     * By default we use caching system with 3600 seconds window to speed up similar requests to API. 
     * If you want to disable caching, you can set 0 here.
     * 
     * @param int $value Cache timeout in seconds
     */
    public function setCacheTimeout(
        $value)
    {
        $value = (int) $value;
        if ($value >= 0) {
            $this->cache_timeout = $value;
        }
    }

    /**
     * Set the API cache timeout back to default value
     * 
     * By default we use caching system with 3600 seconds window to speed up similar requests to API. 
     */
    public function unsetCacheTimeout()
    {
        $this->cache_timeout = 3600;
    }

    /**
     * Get non watermarked video URL.
     * 
     * @param string $video_url TikTok video URL.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getNoWatermarkUrl(
        $video_url = '')
    {
        if (empty($video_url)) {
            throw new TikTokException("Empty video URL.");
        }

        $response = $this->request('getNoWatermarkUrl')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_url', $video_url)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get non watermarked video url by video ID.
     * 
     * @param string $video_id  TikTok video ID.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getNoWatermarkUrlByID(
        $video_id = '')
    {
        if (empty($video_id)) {
            throw new TikTokException("Empty video ID.");
        }

        $response = $this->request('getNoWatermarkUrlByID')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_id', $video_id)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get video info by ID.
     * 
     * @param string $video_id  TikTok video ID.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getVideoByID(
        $video_id = '')
    {
        if (empty($video_id)) {
            throw new TikTokException("Empty video ID.");
        }

        $response = $this->request('getVideoByID')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_id', $video_id)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get video info by URL
     * 
     * @param string $video_url TikTok video URL.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getVideoByUrl(
        $video_url = '')
    {
        if (empty($video_url)) {
            throw new TikTokException("Empty video URL.");
        }

        $response = $this->request('getVideoByUrl')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_url', $video_url)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Convert short TikTok video URL to full TikTok video URL
     * 
     * @param string $video_url TikTok video URL.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getUnshortenedUrl(
        $video_url = '')
    {
        if (empty($video_url)) {
            throw new TikTokException("Empty video URL.");
        }

        $response = $this->request('getUnshortenedUrl')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_url', $video_url)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get comments list by video URL
     * 
     * @param string $video_url TikTok video URL.
     * @param string $cursor    Used for scrolling (pagination) in comments items, you can get cursor value from the previous response.
     * @param int    $count     Number of comments you want to get. For example: 30.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getCommentsByUrl(
        $video_url = '',
        $cursor = '',
        $count = 30) 
    {
        if (empty($video_url)) {
            throw new TikTokException("Empty video URL.");
        }

        $response = $this->request('getCommentsByUrl')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_url', $video_url)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get comments list by video ID
     * 
     * @param string $video_id  TikTok video ID.
     * @param string $cursor    Used for scrolling (pagination) in comments items, you can get cursor value from the previous response.
     * @param int    $count     Number of comments you want to get. For example: 30.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function getCommentsByID(
        $video_id = '',
        $cursor = '',
        $count = 30)
    {
        if (empty($video_id)) {
            throw new TikTokException("Empty video ID.");
        }

        $response = $this->request('getCommentsByID')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('video_id', $video_id)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Search for user by keyword
     * 
     * @param string $keyword       Any text or keyword
     * @param string $cursor        Used for scrolling (pagination) in the list of users, you can get cursor value from the previous response.
     * @param int    $count         Number of users you want to get. For example: 10.
     * @param string $date_posted   How long ago was the video posted. Valid values: 'yesterday', 'this-week', 'this-month', 'last-3-months', 'last-6-months' and 'all-time'.
     * @param string $sort_by       Sort videos by metrics. Valid values: 'most-liked' or 'relevance'.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function searchUser(
        $keyword = '',
        $cursor = '',
        $count = 10,
        $date_posted = 'all-time',
        $sort_by = 'relevance')
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchUser')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('keyword', $keyword)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->addParam('date_posted', $date_posted)
            ->addParam('sort_by', $sort_by)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Search for video by keyword
     * 
     * @param string $keyword   Any text or keyword
     * @param string $cursor    Used for scrolling (pagination) in the list of videos, you can get cursor value from the previous response.
     * @param int    $count     Number of videos you want to get. For example: 10.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function searchVideo(
        $keyword = '',
        $cursor = '',
        $count = 10)
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchVideo')
            ->addParam('license_key', $this->licenseKey) 
            ->addParam('keyword', $keyword)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Search for music by keyword
     * 
     * @param string $keyword   Any text or keyword
     * @param string $cursor    Used for scrolling (pagination) in the list of music tracks, you can get cursor value from the previous response.
     * @param int    $count     Number of music tracks you want to get. For example: 10.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function searchMusic(
        $keyword = '',
        $cursor = '',
        $count = 10)
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchMusic')
            ->addParam('license_key', $this->licenseKey) 
            ->addParam('keyword', $keyword)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Search for live by keyword
     * 
     * @param string $keyword   Any text or keyword
     * @param string $offset    Used for scrolling (pagination) in the list of lives, you can get cursor value from the previous response.
     * @param string $count     Number of lives you want to get. For example: 10.
     * 
     * @throws \TikTokRESTAPI\Exception\TikTokException
     * @throws \TikTokRESTAPI\Exception\BadRequestException
     * @throws \TikTokRESTAPI\Exception\ForbiddenException
     * @throws \TikTokRESTAPI\Exception\NotFoundException
     * @throws \TikTokRESTAPI\Exception\ProxyAuthException
     * @throws \TikTokRESTAPI\Exception\TooManyRequestsException
     * @throws \Exception
     * 
     * @return \TikTokRESTAPI\Response\APIResponse
     */
    public function searchLive(
        $keyword = '',
        $offset = '',
        $count = 10)
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchLive')
            ->addParam('license_key', $this->licenseKey) 
            ->addParam('keyword', $keyword)
            ->addParam('offset', $offset)
            ->addParam('count', $count)
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