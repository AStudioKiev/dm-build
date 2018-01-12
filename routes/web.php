<?php

Auth::routes();

Route::get('/', 'MainController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'Admin\IndexController@index');

    Route::group(['prefix' => 'banners'], function (){
        Route::get('/', 'Admin\BannersController@index');
        Route::get('/add', 'Admin\BannersController@addIndex');
        Route::post('/add', 'Admin\BannersController@add');
        Route::get('/edit', 'Admin\BannersController@editIndex');
        Route::post('/edit', 'Admin\BannersController@edit');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\BannersController@basket');
            Route::post('/delete', 'Admin\BannersController@basketDelete');
            Route::post('/recover', 'Admin\BannersController@basketRecover');
            Route::post('/clear', 'Admin\BannersController@basketClear');
        });
    });

    Route::group(['prefix' => 'types'], function (){
        Route::get('/', 'Admin\TypesController@index');
        Route::get('/add', 'Admin\TypesController@addIndex');
        Route::post('/add', 'Admin\TypesController@add');
        Route::get('/edit', 'Admin\TypesController@editIndex');
        Route::post('/edit', 'Admin\TypesController@edit');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\TypesController@basket');
            Route::post('/delete', 'Admin\TypesController@basketDelete');
            Route::post('/recover', 'Admin\TypesController@basketRecover');
            Route::post('/clear', 'Admin\TypesController@basketClear');
        });
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('/', 'Admin\ProductsController@index');
        Route::get('/add', 'Admin\ProductsController@addIndex');
        Route::post('/add', 'Admin\ProductsController@add');
        Route::get('/edit', 'Admin\ProductsController@editIndex');
        Route::post('/edit', 'Admin\ProductsController@edit');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\ProductsController@basket');
            Route::post('/delete', 'Admin\ProductsController@basketDelete');
            Route::post('/recover', 'Admin\ProductsController@basketRecover');
            Route::post('/clear', 'Admin\ProductsController@basketClear');
        });
    });
});