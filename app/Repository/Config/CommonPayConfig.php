<?php


namespace App\Repository\Config;


class CommonPayConfig implements Common
{
    public static $url = 'https://test_tran.verajft.com/fusionPosp/';

    public static $md5 = '1ADFHQPBYTHDM8HC';

    public static $aes = '5VN86HV2UCDH3AK5'; //975fc77602194d7e

    public static $orgCode = 'YMD001';


    public static function postData($post, $arr)
    {
        if (!empty($post))
        {
            $res = $post;
        }else{
            $res = $arr;
        }

        return $res;
    }
}
