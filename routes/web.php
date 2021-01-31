<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'indexController@index');

// Route::resource('item', 'ItemController');

// Route::group(['middleware' => ['web']], function () {
//   Route::resource('user', 'UserController');
// });

Route::get('/', 'indexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/item/regist', 'ItemSubmitController@index');

Route::post('/item/submit','ItemSubmitController@store')->name('submit');

Route::get('/item/detail/{item_id}', 'ItemController@indexDetail')->name('detail');

Route::get('/cart', 'CartController@index')->name('cart');

Route::get('/cart/in/{item_id}', 'CartController@cartIn');

Route::get('/cart/{crt_id}', 'CartController@cartDelete');

Route::get('/contact', 'ContactController@index');

Route::post('/contact/mailsend', 'ContactController@mailSend')->name('mailsend');
// 名前変更するかも

Route::get('/list', 'ListController@index')->name('list');

Route::post('/cart/update', 'CartController@amountUpdate');

Route::get('/order', 'OrderController@index')->name('order');

Route::get('/mypage', 'MypageController@index')->name('mypage');

Route::get('/mypage/userInfo', 'MypageController@userInfo')->name('userInfo');

Route::get('/mypage/likeItem', 'MypageController@likeItem')->name('likeItem');

Route::get('/mypage/submitItem', 'MypageController@submitItem')->name('submitItem');

Route::get('/mypage/history', 'MypageController@history')->name('history');

Route::post('/like', 'LikeController@like')->name('like');

Route::post('/charge', 'ChargeController@charge')->name('charge');

Route::get('/order/complete', 'OrderController@complete')->name('complete');

Route::get('/twitter/test', 'TwitterController@test');

Route::get('/twitter/login', 'TwitterController@redirectToProvider');

Route::get('/twitter/callback', 'TwitterController@redirectToProvider');

// Route::get('mail/pre', function () {
//   return new \App\Mail\ContactMail();
// });
// メール確認用に定義