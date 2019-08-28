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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/profile', function () {
//    return "Hello world";
//});

Auth::routes();



Route::get('/','ProductsController@index')->name('index');


//Route::get('/product/view/{id}','ProductsController@view')->name('view.product');
//Route::get('/product/create','ProductsController@create')->name('create.product');
//
//Route::get('/product/delete/{$id}','ProductsController@destroy')->name('delete.product');
//
//Route::post('/product/store','ProductsController@store')->name('store.product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resourse('category','ProductCategoriesController');
//Route::resource('product','ProductsController');
Route::resource('product/comment','CommentsController');

Route::get('/products','ProductsController@index')->name('product.index');
Route::get('/product/create','ProductsController@create')->name('product.create');
Route::post('/product/create','ProductsController@store')->name('product.store');
Route::get('/product/{id}/show','ProductsController@show')->name('product.show');
Route::get('/product/{id}/edit','ProductsController@edit')->name('product.edit');
Route::put('/product/{id}/update','ProductsController@update')->name('product.update');
Route::get('/product/{id}/delete','ProductsController@destroy')->name('product.destroy');


Route::get('/categories','ProductCategoriesController@index')->name('category.index');
Route::get('/category/create','ProductCategoriesController@create')->name('category.create');
Route::post('/category/create','ProductCategoriesController@store')->name('category.store');
Route::get('/category/{id}/edit','ProductCategoriesController@edit')->name('category.edit');
Route::put('/category/{id}/update','ProductCategoriesController@update')->name('category.update');
Route::get('/category/{id}/delete','ProductCategoriesController@destroy')->name('category.destroy');

Route::namespace('Admin')->group(function () {
    Route::get('/','HomeController@index')->name('admin.index');
    Route::get('/products','ProductsController@index')->name('admin.product.index');
    Route::get('/product/create','ProductsController@create')->name('admin.product.create');
    Route::post('/product/create','ProductsController@store')->name('admin.product.store');
    Route::get('/product/{id}/show','ProductsController@show')->name('admin.product.show');
    Route::get('/product/{id}/edit','ProductsController@edit')->name('admin.product.edit');
    Route::put('/product/{id}/update','ProductsController@update')->name('admin.product.update');
    Route::get('/product/{id}/delete','ProductsController@destroy')->name('admin.product.destroy');

    Route::get('/categories','ProductCategoriesController@index')->name('admin.category.index');
    Route::get('/category/create','ProductCategoriesController@create')->name('admin.category.create');
    Route::post('/category/create','ProductCategoriesController@store')->name('admin.category.store');
    Route::get('/category/{id}/edit','ProductCategoriesController@edit')->name('admin.category.edit');
    Route::put('/category/{id}/update','ProductCategoriesController@update')->name('admin.category.update');
    Route::get('/category/{id}/delete','ProductCategoriesController@destroy')->name('admin.category.destroy');
});









Route::get('/add-to-cart/{id}', 'ProductsController@addToCart')->name('product.addToCart');
Route::get('/cart','CartsController@allProducts')->name('cart.allProduct');
