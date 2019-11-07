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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hello', function () {
//     echo '<h1>VIETPRO</h1>';
// });


//FRONTEND

Route::get('', function () {
    echo 'index';
});

Route::get('about', function () {
    echo 'about';
});
Route::get('contact', function () {
    echo 'contact';
});
//cart
Route::get('cart', function () {
    echo 'cart';
});

//checkout
Route::get('checkout', function () {
    echo 'checkout';
});
Route::get('checkout/complete', function () {
    echo 'conplete';
});


//product
Route::get('product/detail', function () {
    echo 'detail';
});
Route::get('product/shop', function () {
    echo 'shop';
});

//----------------------------------

//BACKEND
//login
Route::get('login','backend\LoginController@getLogin');


Route::group(['prefix' => 'admin'], function () {

//admin
Route::get('', 'backend\IndexController@getIndex');

//category
Route::group(['prefix' => 'category'], function () {
    Route::get('', 'backend\CategoryController@getCategory');
    Route::get('edit', 'backend\CategoryController@getEditCategory');
});

//order
Route::group(['prefix' => 'order'], function () {
    Route::get('', 'backend\OrderController@getOrder');
    Route::get('detail','backend\OrderController@getDetail');
    Route::get('processed','backend\OrderController@getProcessed' );
});


//product
Route::group(['prefix' => 'product'], function () {
    Route::get('','backend\ProductController@getProduct' );
    Route::get('edit','backend\ProductController@getEditProduct' );
    Route::get('add','backend\ProductController@getAddProduct' );
});

//user
Route::group(['prefix' => 'user'], function () {
    Route::get('', 'backend\UserController@getUser');
    Route::get('add', 'backend\UserController@getAddUser');
    Route::get('edit', 'backend\UserController@getEditUser');

});


});




