<?php

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') ->middleware('verified');


Route::get('/', function () {

    return 'Home';
});

Route::get('/dashboard',function(){
    return 'dashboard';
});

Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');

Route::get('fillable','CrudController@getOffers');

//Route::get('store', 'CrudController@store');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix'=>'offers'], function(){
        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name('offers.store');
    });
    
});






/*
Route::get('/hello-number/{id}', function ($id) {
    return $id;
}) -> name('a');
Route::get('/hello-string/{id?}', function () {
    return 'ahmed hamdy';
}) -> name('b');

Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
    Route::get('/',function(){
        return 'work';
    });
    Route::get('show','UserControl@showUserName');
    Route::delete('delete','UserControl@showUserName');
    Route::get('edit','UserControl@showUserName');
    Route::put('update','UserControl@showUserName');
});

Route::get('check',function(){
    return 'middleware';
})->middleware('auth');
Route::group(['namespace'=>'Admin'],function(){
    Route::get('second','SecondController@showString0')->middleware('auth');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3');
});
Route::get('login',function(){
    return ' Must be logined to access this Route';
}) -> name('login');

Route::resource('news','NewsController');

Route::get('index','Front\UserController@getIndex');
Route::get('/landing',function(){
    return view('landing');
});
Route::get('/about',function(){
    return view('about');
});
*/