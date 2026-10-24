<?php
declare(strict_types=1);
require dirname(__DIR__).'/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
function check(bool $v,string $m): void {if(!$v)throw new RuntimeException($m);}
$history=[];$mock=new MockHandler([new Response(200,['Content-Type'=>'application/json'],json_encode(['status'=>'ok','tiktok'=>['aweme_detail'=>['aweme_id'=>'7106855913906081070']]])),new Response(403,['Content-Type'=>'application/json'],'{"message":"Forbidden"}')]);
$handler=HandlerStack::create($mock);$handler->push(GuzzleHttp\Middleware::history($history));
$tiktok=new TikTokRESTAPI\TikTok('offline-secret',true);$tiktok->httpClient=new Client(['handler'=>$handler]);
ob_start();$data=$tiktok->request('getVideoByID')->addParam('video_id','a&b?x=1+/Ю')->getResponse();$debug=ob_get_clean();
check(strpos($debug,'offline-secret')===false,'Debug leaked license');
check($history[0]['request']->getMethod()==='GET','GET became POST');
parse_str($history[0]['request']->getUri()->getQuery(),$query);
check($query['license_key']==='offline-secret' && $query['video_id']==='a&b?x=1+/Ю','Query encoding or automatic authentication');
check($history[0]['options']['verify']===true && $history[0]['options']['curl'][CURLOPT_SSL_VERIFYHOST]===2,'TLS or redirects');
$m=new TikTokRESTAPI\Response\APIResponse($data);check($m->isOk() && $m->getTiktok()->getAwemeDetail()->getAwemeId()==='7106855913906081070','Mapped video');
$tiktok->debug=false;
try{$tiktok->call('getUserInfo',['query'=>'apple']);throw new RuntimeException('Expected ForbiddenException');}catch(TikTokRESTAPI\Exception\ForbiddenException){}
try{$tiktok->request('https://attacker.example')->getUrl();throw new RuntimeException('Allowed external endpoint');}catch(TikTokRESTAPI\Exception\TikTokException){}
foreach(['getUserFeed','getLiveInfo','getCommentsByID','getVideoByID','getAvailableRankingList'] as $method)check(method_exists($tiktok,$method),'Missing endpoint '.$method);
echo "Legacy PHP: methods, models, GET, encoding, TLS, redirect policy, error mapping and redaction passed.\n";
