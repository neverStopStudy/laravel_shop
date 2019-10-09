<?php

use App\Purchase;
use App\Http\Middleware\CheckUserRole;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resourse('category','ProductCategoriesController');
//Route::resource('product','ProductsController');
Route::resource('product/comment','CommentsController');

Route::get('/','ProductsController@index')->name('product.index');
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

Route::middleware(CheckUserRole::class)->group(function () {
    Route::namespace('Admin')->group(function () {
        //    Auth::routes();
        Route::get('admin/', 'HomeController@index')->name('admin.index');
        Route::get('admin/products', 'ProductsController@index')->name('admin.product.index');
        Route::get('admin/product/create', 'ProductsController@create')->name('admin.product.create');
        Route::post('admin/product/create', 'ProductsController@store')->name('admin.product.store');
        Route::get('admin/product/{id}/show', 'ProductsController@show')->name('admin.product.show');
        Route::get('admin/product/{id}/edit', 'ProductsController@edit')->name('admin.product.edit');
        Route::put('admin/product/{id}/update', 'ProductsController@update')->name('admin.product.update');
        Route::get('admin/product/{id}/delete', 'ProductsController@destroy')->name('admin.product.destroy');

        Route::get('admin/categories', 'ProductCategoriesController@index')->name('admin.category.index');
        Route::get('admin/category/create', 'ProductCategoriesController@create')->name('admin.category.create');
        Route::post('admin/category/create', 'ProductCategoriesController@store')->name('admin.category.store');
        Route::get('admin/category/{id}/edit', 'ProductCategoriesController@edit')->name('admin.category.edit');
        Route::put('admin/category/{id}/update', 'ProductCategoriesController@update')->name('admin.category.update');
        Route::get('admin/category/{id}/delete', 'ProductCategoriesController@destroy')->name('admin.category.destroy');

        Route::get('/purchases', 'PurchasesController@index')->name('admin.purchase.index');
        Route::get('/purchases/new', 'PurchasesController@newpurchases')->name('admin.purchase.newpurchases');
        Route::get('/purchases/paid', 'PurchasesController@paid')->name('admin.purchase.paid');
        Route::get('/purchases/unpaid', 'PurchasesController@unpaid')->name('admin.purchase.unpaid');
        Route::get('/purchases/{id}/edit', 'PurchasesController@edit')->name('admin.purchase.edit');
        Route::get('/purchases/{id}/update', 'PurchasesController@update')->name('admin.purchase.update');
        Route::get('/purchases/{id}/delete', 'PurchasesController@delete')->name('admin.purchase.destroy');
    });
});

Route::get('/add-to-cart/{id}', 'ProductsController@addToCart')->name('product.addToCart');
Route::get('/cart','CartsController@allProducts')->name('cart.allProduct');
Route::post('/cart/purchases','PurchasesController@store')->name('purchases.store');
