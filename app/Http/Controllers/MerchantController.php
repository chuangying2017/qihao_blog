<?php

namespace App\Http\Controllers;

use App\Repository\Config\BusinessChannel;
use App\Repository\Config\CommonPayConfig;
use GuzzleHttp\Client;

class MerchantController extends Controller
{

    protected $path = 'interface/memberReg';

    protected $businessChannel;


    public function __construct(BusinessChannel $businessChannel)
    {

        $this->businessChannel = $businessChannel;
    }

    /**
     * 注册商户号
     */
    public function register()
    {
        $url = CommonPayConfig::$url . $this->path;

        $arr = [
            "verCode" => '1001',
            "merCode" => date('YmdHis') . strtoupper(substr(uniqid(),6,2)),
            "merName" => '小程程',
            "realName" => '张志伟',
            "merAddress" => '广东省广州市白云区齐富路1-11号',
            "idCard" => '441381199212242916',
            "mobile" => '13059551109',
            "accountName" => '张志伟',
            "accountNo" => '6212262008011769990',
            "reservedMobile" => '13059551109',
            "subBankCode" => '105581021041',
            "settleAccType" => '1'
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 4.1.2商户业务开通接口
     */
    public function businessLiberal()
    {
        $path = 'interface/memberBus';

        $url = CommonPayConfig::$url . $path;

        $arr = [
            "drawFee" => 0.5,
            "tradeRate" => 0.006,
            "verCode" => 1001,
            "chMerCode" => 'C030019121938004',
            "busCode" => 2001
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 绑卡 申请
     *   "resCode" => "0028"     "resMsg" => "支付通道不存在"
     */
    public function bindCardApply()
    {
        $url = CommonPayConfig::$url . 'interface/bindCardApply';

        $arr = [
            "verCode" => '1001',
            "chMerCode" => 'C030019121938004',
            "busCode" => '2001',
            "orderCode" => strtoupper(uniqid('DD')) . (string)random_int(000,999) . substr(time(),7,3),
            "accName" => 'zhangxiaowei',
            "idCard" => '430922198810178913',
            "accNo" => '528856003853',
            "accType" => '2',
            "cvv2" => '460',
            "validityDate" => date('mY'),
            "mobile" => '13922706311',
            "callBackUrl" => 'http://http://dh.c.020wl.cn/api_callback/backendUrl'
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 解绑卡
     */
    public function parseBindCard()
    {
        $url = CommonPayConfig::$url . 'interface/unbindCard';

        $arr = [
            "verCode" => '1001',
            "chMerCode" => 'C030019121938004',
            "busCode" => '2001',
            "accNo" => '528856003853'
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }


    /**
     * 绑卡异步通知
     */
    public function bindCardAsyncNotify()
    {

    }

    /**
     * 商户业务开通接口查询
     */
    public function businessAisle()
    {
        $url = CommonPayConfig::$url . 'interface/memberBusQuery';

        $arr = [
            "verCode" => '1001',
            "chMerCode" => 'C030019121938004'
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 商户业务费率修改接口
     */
    public function businessFeeUpdate()
    {
        $url = CommonPayConfig::$url . 'interface/rateModify';

        $arr = [
            "verCode" => '',
            "chMerCode" => '',
            "busCode" => '',
            "drawFee" => '',
            "tradeRate" => '',
            "T1FeeRate" => ''
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 商户结算卡修改接口
     */
    public function businessSettleCard()
    {
        $url = CommonPayConfig::$url . 'interface/bankCardModify';

        $arr = [
            "verCode" => '',
            "chMerCode" => '',
            "accountName" => '', //真实姓名和结算户名必须一致
            "accountNo" => '', //仅为储蓄卡
            "reservedMobile" => '', //结算卡的预留手机号
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 商户照片上传接口
     */
    public function businessPhotoUpload()
    {
        $url = CommonPayConfig::$url . 'imp/photoUpload';

        $filename = '701d58baa1af9733cc2aeaaec1c245d.jpg';

        $base64 = imgToBase64($filename);

        $arr = [
            "verCode" => '1001',
            "chMerCode" => 'C030019121938004',
            "busCode" => '2001',
            "photoType" => '2',
            "photoData" => $base64,
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    /**
     * 商户接口信息查询
     */
    public function businessInterfaceGet()
    {
        $url = CommonPayConfig::$url . 'interface/memberQuery';

        $arr = [
            "verCode" => '',
            "chMerCode" => ''
        ];

        $arr = CommonPayConfig::postData(request()->post(), $arr);

        $res = $this->businessChannel->verifyData($url, $arr);

        return response()->json($res);
    }

    public function test_file_upload()
    {
        $post = request()->post();

        $file = request()->file('image');

        $name = $file->getClientOriginalName();

        $path = $file->storeAs('images',$name.'.jpg');

        return response()->json([
            'status'=>'success',
            'path' => $path,
            'data' => $post
        ]);
    }
}
