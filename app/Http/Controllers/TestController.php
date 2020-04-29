<?php

namespace App\Http\Controllers;

use App\Utils\Curl;
use Illuminate\Http\Request;
use GuzzleHttp;
use function PHPSTORM_META\type;

class TestController extends Controller
{
    public function index()
    {
        return view('index');

    }

    public function getListData()
    {
        $url = 'https://kxuan.taobao.com/searchSp.htm?_ksTS=1587389255613_19&callback=jsonp20&q=%E8%BF%9E%E8%A1%A3%E8%A3%99&ruletype=2&searchtype=item&nested=we&id=4525&kxuan_swyt_item=37316&ruletype=2&enginetype=0&ie=utf8';
//        $headers = [
//            'referer' => 'https://kxuan.taobao.com/',
//            'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36',
//
//        ];
        $client = new GuzzleHttp\Client();
        $res = $client->request('get', $url, ['verify'=>false]);
        preg_match('#jsonp20\(.*?("auctions":.*?),"sellers#is', (string) $res->getBody(), $match);
//        foreach (json_decode('{' . $match[1] . '}') as $key=>$value){
//
//        }
        return json_decode('{' . $match[1] . '}', true);
    }
}
