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
