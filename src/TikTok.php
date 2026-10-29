<?php
namespace TikTokRESTAPI;

use \TikTokRESTAPI\Exception\TikTokException;

/**
 * TikTok REST API wrapper for PHP
 * 
 * @author Evelode (https://evelode.com/downloads/tiktok-rest-api/)
 */
class TikTok
{
    /** @var string HTTPS API base; override with a local test server when needed. */
    public $baseUrl = 'https://tiktok.evelode.com';
    /** @var float Timeout in seconds. */
    public $timeout = 30;
    /** @var \GuzzleHttp\ClientInterface|null Dependency injection for framework integration and tests. */
    public $httpClient;

    public function setBaseUrl(string $url): self
    {
        $parts=parse_url($url);
        if (!$parts || empty($parts['host']) || isset($parts['user']) || isset($parts['pass']) || isset($parts['query']) || isset($parts['fragment']) || (($parts['scheme']??'')!=='https' && !(($parts['scheme']??'')==='http' && in_array($parts['host'],['localhost','127.0.0.1','[::1]'],true)))) throw new \InvalidArgumentException('Use an HTTPS base URL');
        $this->baseUrl=rtrim($url,'/');return $this;
    }

    public function setTimeout(float $seconds): self
    {
        if(!is_finite($seconds)||$seconds<=0)throw new \InvalidArgumentException('Timeout must be positive');
        $this->timeout=$seconds;return $this;
    }

    /** Complete access to the current API; preserves unknown response fields. */
    public function call(string $endpoint, array $parameters=[]): Response\APIResponse
    {
        $request=$this->request($endpoint);
        foreach($parameters as $name=>$value)if($name!=='license_key' && $value!==null)$request->addParam($name,$value);
        $data = $request->getResponse();
        return match ($endpoint) {
            'getUserID', 'getUsernameByID', 'getTwitterUsername', 'getInstagramUsername', 'getYoutubeChannel' => new Response\ScalarResponse($data),
            'getStoryInfoByID' => new Response\StoryResponse($data),
            'getRankingInfo' => new Response\RankingResponse($data),
            'getLiveInfo' => new Response\LiveResponse($data),
            default => new Response\APIResponse($data),
        };
    }

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
        $count = 10)
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchUser')
            ->addParam('license_key', $this->licenseKey)
            ->addParam('keyword', $keyword)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Search for video by keyword
     * 
     * @param string $keyword   Any text or keyword
     * @param string $cursor    Used for scrolling (pagination) in the list of videos, you can get cursor value from the previous response.
     * @param int    $count     Number of videos you want to get. For example: 10.
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
    public function searchVideo(
        $keyword = '',
        $cursor = '',
        $count = 10,
        $date_posted = 'all-time',
        $sort_by = 'relevance')
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchVideo')
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
     * Search for hashtag by keyword
     * 
     * @param string $keyword   Any text or keyword
     * @param string $cursor    Used for scrolling (pagination) in the list of lives, you can get cursor value from the previous response.
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
    public function searchHashtag(
        $keyword = '',
        $cursor = '',
        $count = 10)
    {
        if (empty($keyword)) {
            throw new TikTokException("Empty keyword.");
        }

        $response = $this->request('searchHashtag')
            ->addParam('license_key', $this->licenseKey) 
            ->addParam('keyword', $keyword)
            ->addParam('cursor', $cursor)
            ->addParam('count', $count)
            ->getResponse();

        return new Response\APIResponse($response);
    }

    /**
     * Get user info by profile URL or nickname
     * 
     * @param string $query    TikTok username
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
    public function getUserInfo(
        $query = '')
    {
        if (empty($query)) {
            throw new TikTokException("Empty username.");
        }

        $response = $this->request('getUserInfo')
            ->addParam('license_key', $this->licenseKey) 
            ->addParam('query', $query)
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

    /** Get comments replies. See docs/endpoints.md for query parameters. */
    public function getCommentsReplies(array $parameters=[]): Response\APIResponse { return $this->call('getCommentsReplies',$parameters); }
    /** Search for location by keyword. See docs/endpoints.md for query parameters. */
    public function searchLocation(array $parameters=[]): Response\APIResponse { return $this->call('searchLocation',$parameters); }
    /** Top search by text query. See docs/endpoints.md for query parameters. */
    public function searchTop(array $parameters=[]): Response\APIResponse { return $this->call('searchTop',$parameters); }
    /** Search insights by text query. See docs/endpoints.md for query parameters. */
    public function searchInsights(array $parameters=[]): Response\APIResponse { return $this->call('searchInsights',$parameters); }
    /** Search comment suggested users. See docs/endpoints.md for query parameters. */
    public function searchCommentSuggestedUsers(array $parameters=[]): Response\APIResponse { return $this->call('searchCommentSuggestedUsers',$parameters); }
    /** Get user info by profile ID. See docs/endpoints.md for query parameters. */
    public function getUserInfoByID(array $parameters=[]): Response\APIResponse { return $this->call('getUserInfoByID',$parameters); }
    /** Get user info by username. See docs/endpoints.md for query parameters. */
    public function getBasicUserInfo(array $parameters=[]): Response\APIResponse { return $this->call('getBasicUserInfo',$parameters); }
    /** Get user feed by profile URL or nickname. See docs/endpoints.md for query parameters. */
    public function getUserFeed(array $parameters=[]): Response\APIResponse { return $this->call('getUserFeed',$parameters); }
    /** Get user feed by profile ID. See docs/endpoints.md for query parameters. */
    public function getUserFeedByID(array $parameters=[]): Response\APIResponse { return $this->call('getUserFeedByID',$parameters); }
    /** Get user ID by profile URL or nickname. See docs/endpoints.md for query parameters. */
    public function getUserID(array $parameters=[]): Response\APIResponse { return $this->call('getUserID',$parameters); }
    /** Get username by TikTok user ID. See docs/endpoints.md for query parameters. */
    public function getUsernameByID(array $parameters=[]): Response\APIResponse { return $this->call('getUsernameByID',$parameters); }
    /** Get Twitter username by profile URL, nickname or TikTok user ID. See docs/endpoints.md for query parameters. */
    public function getTwitterUsername(array $parameters=[]): Response\APIResponse { return $this->call('getTwitterUsername',$parameters); }
    /** Get Instagram username by profile URL, nickname or TikTok user ID. See docs/endpoints.md for query parameters. */
    public function getInstagramUsername(array $parameters=[]): Response\APIResponse { return $this->call('getInstagramUsername',$parameters); }
    /** Get YouTube channel info by profile URL, nickname or TikTok user ID. See docs/endpoints.md for query parameters. */
    public function getYoutubeChannel(array $parameters=[]): Response\APIResponse { return $this->call('getYoutubeChannel',$parameters); }
    /** Get user followers by profile URL or nickname. See docs/endpoints.md for query parameters. */
    public function getFollowers(array $parameters=[]): Response\APIResponse { return $this->call('getFollowers',$parameters); }
    /** Get user followers by profile ID. See docs/endpoints.md for query parameters. */
    public function getFollowersByID(array $parameters=[]): Response\APIResponse { return $this->call('getFollowersByID',$parameters); }
    /** Get user following by profile URL or nickname. See docs/endpoints.md for query parameters. */
    public function getFollowing(array $parameters=[]): Response\APIResponse { return $this->call('getFollowing',$parameters); }
    /** Get user following by profile ID. See docs/endpoints.md for query parameters. */
    public function getFollowingByID(array $parameters=[]): Response\APIResponse { return $this->call('getFollowingByID',$parameters); }
    /** Get live event info by ID. See docs/endpoints.md for query parameters. */
    public function getLiveEventInfoByID(array $parameters=[]): Response\APIResponse { return $this->call('getLiveEventInfoByID',$parameters); }
    /** Get hashtag info by URL or tag name. See docs/endpoints.md for query parameters. */
    public function getHashtagInfo(array $parameters=[]): Response\APIResponse { return $this->call('getHashtagInfo',$parameters); }
    /** Get hashtag feed by URL or tag name. See docs/endpoints.md for query parameters. */
    public function getHashtagFeed(array $parameters=[]): Response\APIResponse { return $this->call('getHashtagFeed',$parameters); }
    /** Get hashtag feed by ID. See docs/endpoints.md for query parameters. */
    public function getHashtagFeedByID(array $parameters=[]): Response\APIResponse { return $this->call('getHashtagFeedByID',$parameters); }
    /** Get location info by ID. See docs/endpoints.md for query parameters. */
    public function getLocationInfoByID(array $parameters=[]): Response\APIResponse { return $this->call('getLocationInfoByID',$parameters); }
    /** Get videos by location ID. See docs/endpoints.md for query parameters. */
    public function getLocationFeedByID(array $parameters=[]): Response\APIResponse { return $this->call('getLocationFeedByID',$parameters); }
    /** Get music info by URL or ID. See docs/endpoints.md for query parameters. */
    public function getMusicInfo(array $parameters=[]): Response\APIResponse { return $this->call('getMusicInfo',$parameters); }
    /** Get music feed by URL or ID. See docs/endpoints.md for query parameters. */
    public function getMusicFeed(array $parameters=[]): Response\APIResponse { return $this->call('getMusicFeed',$parameters); }
    /** Get music charts. See docs/endpoints.md for query parameters. */
    public function getMusicCharts(array $parameters=[]): Response\APIResponse { return $this->call('getMusicCharts',$parameters); }
    /** Get trending categories list. See docs/endpoints.md for query parameters. */
    public function getTrendingCategoriesList(array $parameters=[]): Response\APIResponse { return $this->call('getTrendingCategoriesList',$parameters); }
    /** Get trending feed. See docs/endpoints.md for query parameters. */
    public function getTrendingFeed(array $parameters=[]): Response\APIResponse { return $this->call('getTrendingFeed',$parameters); }
    /** Get effect information by IDs. See docs/endpoints.md for query parameters. */
    public function getStickersByID(array $parameters=[]): Response\APIResponse { return $this->call('getStickersByID',$parameters); }
    /** Get effect information by ID. See docs/endpoints.md for query parameters. */
    public function getStickerByID(array $parameters=[]): Response\APIResponse { return $this->call('getStickerByID',$parameters); }
    /** Get videos by effect ID. See docs/endpoints.md for query parameters. */
    public function getStickerFeedByID(array $parameters=[]): Response\APIResponse { return $this->call('getStickerFeedByID',$parameters); }
    /** Get user stories. See docs/endpoints.md for query parameters. */
    public function getUserStories(array $parameters=[]): Response\APIResponse { return $this->call('getUserStories',$parameters); }
    /** Get story info by ID. See docs/endpoints.md for query parameters. */
    public function getStoryInfoByID(array $parameters=[]): Response\APIResponse { return $this->call('getStoryInfoByID',$parameters); }
    /** Get user playlists. See docs/endpoints.md for query parameters. */
    public function getUserPlaylists(array $parameters=[]): Response\APIResponse { return $this->call('getUserPlaylists',$parameters); }
    /** Get user playlist by ID. See docs/endpoints.md for query parameters. */
    public function getUserPlaylistByID(array $parameters=[]): Response\APIResponse { return $this->call('getUserPlaylistByID',$parameters); }
    /** Get video by playlist ID. See docs/endpoints.md for query parameters. */
    public function getVideoByPlaylistID(array $parameters=[]): Response\APIResponse { return $this->call('getVideoByPlaylistID',$parameters); }
    /** Get available ranking list. See docs/endpoints.md for query parameters. */
    public function getAvailableRankingList(array $parameters=[]): Response\APIResponse { return $this->call('getAvailableRankingList',$parameters); }
    /** Get ranking info. See docs/endpoints.md for query parameters. */
    public function getRankingInfo(array $parameters=[]): Response\APIResponse { return $this->call('getRankingInfo',$parameters); }
    /** Get live info. See docs/endpoints.md for query parameters. */
    public function getLiveInfo(array $parameters=[]): Response\APIResponse { return $this->call('getLiveInfo',$parameters); }
    /** Get live feed. See docs/endpoints.md for query parameters. */
    public function getLiveFeed(array $parameters=[]): Response\APIResponse { return $this->call('getLiveFeed',$parameters); }
}
