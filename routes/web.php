<?php

Route::get('/', 'HomeController@index');
//Show product by category//
Route::get('/category/{category_id}','HomeController@show_product_by_category');
//Show product by manufacture//
Route::get('/manufacture/{manufacture_id}','HomeController@show_product_by_manufacture');
Route::get('/product/details/{product_id}','HomeController@productDetails');


// Cart //
Route::post('/add-to-cart','CartController@addToCart');
Route::get('/cart','CartController@showCart');
Route::post('cart/update','CartController@updateCart');
Route::get('/cart/item/{id}/remove', 'CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('checkout.cart.clear');

// checkout routes //
Route::get('/login-check','CheckoutController@checkLogin');
Route::post('/customer/registration','CheckoutController@registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('save/shipping_details','CheckoutController@storeShippingDetails');
Route::get('/payment','CheckoutController@payment');

// Customer //
Route::post('/customer/login','CustomerController@login');
Route::get('/customer/logout','CustomerController@logout');


// Admin //
Route::get('/admin', 'AdminController@index');
Route::post('/admin-postlogin','AdminController@dashboard');

Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout','SuperAdminController@logout');

//catrogry //
Route::get('/category/view', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::get('/categroy/unactive/{category_id}','CategoryController@unactive_category');
Route::get('/categroy/active/{category_id}','CategoryController@active_category');
Route::get('/category/edit/{category_id}','CategoryController@edit');
Route::post('/category/update','CategoryController@update');
Route::get('/category/delete/{category_id}','CategoryController@destroy');


// Manufacture//
Route::get('/manufacture/view', 'ManufactureController@index');
Route::get('/manufacture/create', 'ManufactureController@create');
Route::post('/manufacture/store','ManufactureController@store');
Route::get('/manufacture/unactive/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/manufacture/active/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/manufacture/edit/{manufacture_id}','ManufactureController@edit');
Route::post('/manufacture/update','ManufactureController@update');
Route::get('/manufacture/delete/{category_id}','ManufactureController@destroy');


// Product//
Route::get('/product/view', 'ProductController@index');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store','ProductController@store');
Route::get('/product/unactive/{product_id}','ProductController@unactive_product');
Route::get('/product/active/{product_id}','ProductController@active_product');
Route::get('/product/edit/{product_id}','ProductController@edit');
Route::post('/product/update','ProductController@update');
Route::get('/product/delete/{category_id}','ProductController@destroy');


// Slider//
Route::get('/slider/view', 'SliderController@index');
Route::get('/slider/create', 'SliderController@create');
Route::post('/slider/store','SliderController@store');
Route::get('/slider/unactive/{product_id}','SliderController@unactive_slider');
Route::get('/slider/active/{product_id}','SliderController@active_slider');
Route::get('/slider/edit/{product_id}','SliderController@edit');
Route::post('/slider/update','SliderController@update');
Route::get('/slider/delete/{category_id}','SliderController@destroy');