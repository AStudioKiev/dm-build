<?php

Auth::routes();

Route::get('/', 'MainController@index');

Route::get('/catalog', 'MainController@type_catalog');
Route::get('/catalog', 'MainController@full_catalog');
Route::get('/cart', 'MainController@cart');

Route::get('/contacts', 'MainController@contacts');
Route::get('/delivery', 'MainController@delivery');
Route::get('/diller', 'MainController@diller');
Route::get('/pricelist', 'MainController@pricelist');
Route::get('/basket', 'MainController@basket');

Route::post('/getSubtypes', 'MainController@getSubtypes');

Route::group(['prefix' => 'catalog'], function() {
    Route::get('/', 'FiltersController@index');
    Route::get('/{type}', 'FiltersController@getTypeIndex');
    Route::get('/{type}/{subtype}', 'FiltersController@getSubtypeIndex');
    Route::get('/{type}/{subtype}/{product_id}', 'FiltersController@getProductIndex');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'Admin\IndexController@index');

    Route::group(['prefix' => 'posters'], function (){
        Route::get('/', 'Admin\PostersController@index');
        Route::get('/add', 'Admin\PostersController@addIndex');
        Route::post('/add', 'Admin\PostersController@add');
        Route::get('/edit/{id}', 'Admin\PostersController@editIndex');
        Route::post('/edit/{id}', 'Admin\PostersController@edit');
        Route::post('/delete', 'Admin\PostersController@delete');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\PostersController@basket');
            Route::post('/delete', 'Admin\PostersController@basketDelete');
            Route::post('/recover', 'Admin\PostersController@basketRecover');
            Route::post('/clear', 'Admin\PostersController@basketClear');
        });
    });

    Route::group(['prefix' => 'types'], function (){
        Route::get('/', 'Admin\TypesController@typesIndex');
        Route::get('/add', 'Admin\TypesController@addTypeIndex');
        Route::post('/add', 'Admin\TypesController@addType');
        Route::get('/edit/{id}', 'Admin\TypesController@editTypeIndex');
        Route::post('/edit/{id}', 'Admin\TypesController@editType');
        Route::post('/delete', 'Admin\TypesController@delete');

        Route::group(['prefix' => 'subtypes'], function (){
            Route::get('/{id}', 'Admin\TypesController@subtypesIndex');
            Route::get('/{id}/add', 'Admin\TypesController@addSubtypeIndex');
            Route::post('/{id}/add', 'Admin\TypesController@addSubtype');
            Route::get('/edit/{id}', 'Admin\TypesController@editSubtypeIndex');
            Route::post('/edit/{id}', 'Admin\TypesController@editSubtype');
        });
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('/', 'Admin\ProductsController@index');
        Route::get('/add', 'Admin\ProductsController@addIndex');
        Route::post('/add', 'Admin\ProductsController@add');
        Route::get('/edit/{id}', 'Admin\ProductsController@editIndex');
        Route::post('/edit/{id}', 'Admin\ProductsController@edit');
        Route::post('/delete', 'Admin\ProductsController@delete');

        Route::group(['prefix' => 'basket'], function (){
            Route::get('/', 'Admin\ProductsController@basket');
            Route::post('/delete', 'Admin\ProductsController@basketDelete');
            Route::post('/recover', 'Admin\ProductsController@basketRecover');
            Route::post('/clear', 'Admin\ProductsController@basketClear');
        });
    });
});
