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

use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'pay'], function(){
    Route::get('test_post', 'PayTestController@pay_test');
    Route::get('register', 'MerchantController@register');
    Route::get('memberBus', 'MerchantController@businessLiberal');
    Route::get('bindcard', 'MerchantController@bindCardApply');
    Route::get('test_address', function(){

        exec('composer require guzzlehttp/guzzle');

        $arr = [];

        for ($i =10; $i>0; $i--)
        {
            array_push($arr, $i);
        }

        dd($arr);
    });
});


/**
 * 支付回调地址
 */

Route::group(['prefix'=> 'api_callback'], function(){
    Route::post('bingcard', function(){

        $post = request()->post();

        Log::info('绑卡回调', $post);

        return ["status"=>'success'];
    });
});
