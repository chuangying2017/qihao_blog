<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('MERCHANT', 'MerchantController');

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'pay'], function(){
    Route::get('test_post', 'PayTestController@pay_test');
    Route::get('register', MERCHANT.'@register');
    Route::get('memberBus', MERCHANT.'@businessLiberal');
    Route::get('bindcard', MERCHANT.'@bindCardApply');

    Route::get('test_address', function(){

        exec('composer update');

        $arr = [];

        for ($i =10; $i>0; $i--)
        {
            array_push($arr, $i);
        }

        dd($arr);
    });
});

Route::group(['prefix'=>'business'], function(){
    Route::post('interface_get', MERCHANT.'@businessInterfaceGet');
    Route::post('upload_photo', MERCHANT.'@businessPhotoUpload');
    Route::post('settle_card', MERCHANT. '@businessSettleCard');
    Route::post('fee_edit', MERCHANT. '@businessFeeUpdate');
    Route::post('aisle_query', MERCHANT . '@businessAisle');
});


/**
 * 支付回调地址
 */

Route::group(['prefix'=> 'api_callback'], function(){
    Route::post('backendUrl', function(){

        $post = request()->post();

        Log::info('绑卡回调', $post);

        return ["status"=>'success'];
    });
});

Route::post('business/testfileupload', MERCHANT.'@test_file_upload');


Route::get('test_file', function(){

    $filename = 'E:\\project\\newspider\\images_src\full\\';

    $filename .= '0e4148d6b0ede9f682bef27001073846935c80ee.jpg';

    $filesize = filesize($filename);

    $open = fopen($filename, 'r');

//    $read = fread($open, $filesize);


    $client = new Client();

    $data = $client->post('http://www.qihao2019.com/business/testfileupload',[
//        'headers' => [
//            'Content-Type' => 'multipart/form-data; boundary=----WebKitFormBoundarybXVrd1DKuIIXDn5J',
//            'Accept' => 'application/json, text/javascript, */*; q=0.01'
//        ],
       'multipart' => [
           [
               'name'     => 'image',
               'contents' => $open,
               'filename' => 'image'.substr(time(),5,5)
           ],
           [
               'name' => 'cate_id',
               'contents' => '2',
               'headers'  => ['X-Baz' => 'bar']
           ],
           [
               'name' => 'verCode',
               'contents' => '1001',
           ],
           [
               'name' => 'chMerCode',
               'contents' => 'C030019121938004'
           ],
           [
               'name' => 'busCode',
               'contents' => '2001'
           ],
           [
               'name' => 'photoType',
               'contents' => '2'
           ]
       ]
    ]);

//    fclose($open);

    dump($data);
});
