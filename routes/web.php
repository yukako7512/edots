<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group
. Now create something great!
|
*/

Route::get('/', 'EventController@index');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// ログイン　登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('int_p', 'EventController@int_p')->name('int_p.get');
Route::get('index', 'EventController@index')->name('index.get');
Route::get('firstindex', 'EventController@firstindex')->name('firstindex.get');
Route::get('about/us',  'EventController@aboutus')->name('aboutus.get');

// カテゴリー
Route::get('sport_index', 'EventController@sports')->name('sport.get');
Route::get('art_index', 'EventController@arts')->name('art.get');
Route::get('beauty_index', 'EventController@beauty')->name('beauty.get');
Route::get('technology_index', 'EventController@technology')->name('technology.get');
Route::get('food_index', 'EventController@food')->name('food.get');
Route::get('language_index', 'EventController@language')->name('language.get');
Route::get('nature_index', 'EventController@nature')->name('nature.get');
Route::get('others_index', 'EventController@others')->name('others.get');
Route::get('history_index', 'EventController@history')->name('history.get');

// イベント詳細
Route::get('eventshow/{id}', 'EventController@eventshow')->name('eventshow.get');
// ユーザーページへ
Route::get('user/{id}', 'UserController@usershow')->name('usershow.get');
Route::get('requestdone/{id}', 'EventController@requestdone')->name('requestdone.get');

// ポスト機能
Route::get('post',  'EventController@create')->name('post.get');
Route::post('items',  'EventController@store')->name('post.post');

// レビュー
Route::get('review/{event_id}/{attendiee_id}', 'ReviewController@create')->name('review.get');

// レビューDONE
Route::post('reviewdone/{event_id}/{attendiee_id}', 'ReviewController@reviewdone')->name('reviewdone.post');
// Route::get('reviewdone', 'ReviewController@reviewdone')->name('reviewdone.get');

// ArrangeDONE
Route::get('arrangedone/{event_id}/{attendiee_id}','EventController@arrangedone')->name('arrangedone.get');


// レビューDONEからMy page

Route::get('user', 'UserController@mypage')->name('user.get');

// プロフィール編集
Route::get('profileedit/{id}',  'UserController@create')->name('profileedit.get');
Route::post('editdone/{id}', 'UserController@editdone')->name('editdone.post');

Route::get('reviewhistory/{id}', 'ReviewController@review_history')->name('reviewhistory.get');
Route::get('pointhistory', 'UserController@point_history')->name('pointhistory.get');


Route::get('notification/read',  'UserController@notification_read')->name('notification.read');

// HowToUseへ
Route::get('howtouse', 'UserController@howtouse')->name('howtouse.get');





Route::get('chat', 'UserController@chat')->name('chat.get');