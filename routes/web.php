<?php

Auth::routes();

Route::get('/', 'MainController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'Admin\IndexController@index');

    Route::group(['prefix' => 'posters'], function (){
        Route::get('/', 'Admin\PostersController@index');
        Route::get('/add', 'Admin\PostersController@addIndex');
        Route::post('/add', 'Admin\PostersController@add');
        Route::get('/edit/{id}', 'Admin\PostersController@editIndex');
        Route::post('/edit/{id}', 'Admin\PostersController@edit');
        Route::post('/delete', 'Admin\PostersController@delete');
        Route::post('/activate', 'Admin\PostersController@activate');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\PostersController@basket');
            Route::post('/delete', 'Admin\PostersController@basketDelete');
            Route::post('/recover', 'Admin\PostersController@basketRecover');
            Route::post('/clear', 'Admin\PostersController@basketClear');
        });
    });

    Route::group(['prefix' => 'types'], function (){
        Route::get('/', 'Admin\TypesController@index');
        Route::get('/add', 'Admin\TypesController@addIndex');
        Route::post('/add', 'Admin\TypesController@add');
        Route::get('/edit/{id}', 'Admin\TypesController@editIndex');
        Route::post('/edit/{id}', 'Admin\TypesController@edit');

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
        Route::get('/edit/{id}', 'Admin\ProductsController@editIndex');
        Route::post('/edit/{id}', 'Admin\ProductsController@edit');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\ProductsController@basket');
            Route::post('/delete', 'Admin\ProductsController@basketDelete');
            Route::post('/recover', 'Admin\ProductsController@basketRecover');
            Route::post('/clear', 'Admin\ProductsController@basketClear');
        });
    });
});
