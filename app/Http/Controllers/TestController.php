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
        return [
            'list' => json_decode('{' . $match[1] . '}', true)['auctions'],
            'labels' => [
                'id' => '序号',
                'name' => '商品链接',
                'raw_title' => '好货标题',
                'picture' => '模块图片',
            ]
        ];
    }

    // 获取图片
    public function getPicture()
    {
        // 五张高清图
        // 800*800

        // 1000*750

        // 商品详情图

        // 保存到本地

        return ['message'=>'ok'];
    }

    // 获取文案
    public function getContent()
    {
        // 模块 三块

    }

    // 逻辑
    /*
     *  1 爬取淘宝数据列表，数据填充页面
     *  2 生成图片，保存到本地，点击修改，三张图片赋值到表单
     *  3 生成文案，保存到表单
     *  4 发布到阿里达人，获取到阿里达人的token，调用阿里达人的发布接口，一键发布
     *  5 保存用户已经发布出去的商品数据
     *
     *
     *  正式开发时--小功能：
     *      删除未生成
     *      批量操作
     *
     * */
}
