<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', 'TagsController@index')->name('api.totem.tags');
    Route::post('create', 'TagsController@store')->name('api.totem.tag.create');
});
