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

//FRONTEND
Route::get('', 'frontend\HomeController@getIndex');
Route::get('contact', 'frontend\HomeController@getContact');
Route::get('about', 'frontend\HomeController@getAbout');

//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@getCart');
});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('', 'frontend\CheckoutController@getCheckout');
    Route::post('', 'frontend\CheckoutController@postCheckout');
    Route::get('complete', 'frontend\CheckoutController@getComplete');
});

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('shop','frontend\ProductController@getShop' );
    Route::get('detail', 'frontend\ProductController@getDetail');
});




//------------------------
//BACKEND
//login
Route::get('login', 'backend\LoginController@getLogin');
Route::post('login', 'backend\LoginController@postLogin');

Route::group(['prefix' => 'admin'], function () {
    //admin
    Route::get('', 'backend\IndexController@getIndex');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'backend\CategoryController@getCategory');
        Route::post('', 'backend\CategoryController@postAddCategory');
        Route::get('edit','backend\CategoryController@getEditCategory');
    });

    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('', 'backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetail');
        Route::get('processed', 'backend\OrderController@getProcessed');
    });

    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'backend\ProductController@getProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::post('add', 'backend\ProductController@postAddProduct');
        Route::get('edit','backend\ProductController@getEditProduct' );
    });

    //user
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'backend\UserController@getUser');
        Route::get('add','backend\UserController@getAddUser' );
        Route::post('add','backend\UserController@postAddUser' );
        Route::get('edit', 'backend\UserController@getEditUser');
    });

});




//LÝ THUYẾT ---------------------------


//SCHEMA

Route::group(['prefix' => 'schema'], function () {

    //tạo bảng
    Route::get('create', function () {
        Schema::create('users', function ($table) {
            $table->bigIncrements('id');      //khóa chính , tự tăng , bigInt , unsigned
            $table->string('full');           // varchar
            $table->string('address',50);     //varchar , 50 ký tự
            $table->timestamps();             //thời gian updated_at và created_at
        });

        Schema::create('post', function ($table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    });



    //sửa bảng

    Route::get('edit', function () {
        //sửa tên bảng
        // Schema::rename('users', 'nguoi-dung');          //sửa tên bảng từ users thành nguoi-dung

        //xóa cột trong bảng
        Schema::table('nguoi-dung', function ($table) {
            $table->dropColumn('address');

        });



    });

    //xóa bảng

    Route::get('del', function () {

        Schema::dropIfExists('users');
        Schema::dropIfExists('post');
    });



    //thay đổi thuộc tính của cột
    // phải dùng thư viện doctrine

    Route::get('edit-col', function () {

        Schema::table('users', function ($table) {
            //thay đổi giá trị của cột
            // $table->string('full', 100)->nullable()->change();

            //thêm cột
            // $table->boolean('level')->nullable()->default(1);

            //xóa cột
            // $table->dropColumn('level');


            // thêm cột vào sau cột nào đó
            $table->boolean('level')->nullable()->default(1)->after('address');
        });
    });

    });


