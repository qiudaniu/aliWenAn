<?php

namespace App\Utils;

class Curl
{
    public static function curl($url, $type = 'get', $headers = [], $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if (strtoupper($type) == 'POST'){
            array_push($headers, 'content-type: application/json');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data['data']));
        }

        if ($data['ssl']){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $res = curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}