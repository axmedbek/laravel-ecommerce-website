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


//home routes
Route::get('/', 'HomeController@index')->name('home_page');


//category routes
Route::get('/category/{category_name}','CategoryController@index')->name('category_page');


//product routes
Route::get('/product/{product_name}','ProductController@index')->name('product_page');


//search routes
Route::match(['get','post'],'/search','ProductController@search')->name('search_page');

//cart routes
Route::group(['prefix' => 'cart'],function(){
    Route::get('/','CartController@index')->name('cart_page');
    Route::post('/add','CartController@add')->name('cart.add');
    Route::delete('/delete/{rowid}','CartController@delete')->name('cart.delete');
    Route::delete('/deleteAll','CartController@deleteAll')->name('cart.deleteAll');
    Route::patch('/update/{rowid}','CartController@update')->name('cart.update');
});

//payments routes
Route::get('/payment','PaymentController@index')->name('payment_page');
Route::post('/payment/make','PaymentController@make')->name('payment.make');


Route::group(['middleware' =>'auth'],function(){

    //orders routes
    Route::group(['prefix'=>'orders'],function(){
        Route::get('/','OrderController@index')->name('orders_page');
        Route::get('/{order_id}','OrderController@order')->name('order_page');
    });
});



//user routes
Route::group(['prefix'=>'user'],function(){
    Route::get('/login','UserController@login_form')->name('user.login');
    Route::post('/login','UserController@login');
    Route::get('/register','UserController@register_form')->name('user.register');
    Route::post('/register','UserController@register');
    Route::get('/activation/{activation_code}','UserController@activation')->name('activation');
    Route::post('/user/logout','UserController@logout')->name('user.logout');
});

Route::group(['prefix' => 'admin'],function(){
        Route::match(['get','post'],'/login','AdminController@login')->name('admin.login');
    Route::group(['middleware' => 'admin'],function (){
        Route::match(['get','post'],'/','AdminController@index')->name('admin.user');
        Route::get('/home','AdminController@index')->name('admin.home');
        Route::get('/logout','AdminController@logout')->name('admin.logout');
        Route::get('/create','AdminController@create')->name('admin.user.create');
        Route::get('/edit/{id}','AdminController@edit')->name('admin.user.edit');
        Route::post('/save/{id?}','AdminController@save')->name('admin.user.save');
        Route::get('/delete/{id}','AdminController@delete')->name('admin.user.delete');

    });
});


//test mail sending

Route::get('/test/mail',function(){
    $user = \App\User::find(1);
    return new \App\Mail\UserMail($user);
});


