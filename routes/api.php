<?php



Route::get('/cities-by-state/{id}', function ($id) {
    return Cities::get_cities($id);
});

Route::resource('categories', 'Admin\CategoriesController');
Route::resource('stores', 'Admin\StoreController');
Route::resource('products', 'Admin\ProductsController');

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {


});
