<?php

use Illuminate\Support\Facades\Route;

Route::get('attributes', [
    'as' => 'admin.attributes.index',
    'uses' => 'AttributeController@index',
    'middleware' => 'can:admin.attributes.index',
]);

Route::get('attributes/create', [
    'as' => 'admin.attributes.create',
    'uses' => 'AttributeController@create',
    'middleware' => 'can:admin.attributes.create',
]);

Route::post('attributes', [
    'as' => 'admin.attributes.store',
    'uses' => 'AttributeController@store',
    'middleware' => 'can:admin.attributes.create',
]);

Route::get('attributes/{id}/edit', [
    'as' => 'admin.attributes.edit',
    'uses' => 'AttributeController@edit',
    'middleware' => 'can:admin.attributes.edit',
]);

Route::put('attributes/{id}', [
    'as' => 'admin.attributes.update',
    'uses' => 'AttributeController@update',
    'middleware' => 'can:admin.attributes.edit',
]);

Route::delete('attributes/{ids?}', [
    'as' => 'admin.attributes.destroy',
    'uses' => 'AttributeController@destroy',
    'middleware' => 'can:admin.attributes.destroy',
]);

Route::get('attributes/index/table', [
    'as' => 'admin.attributes.table',
    'uses' => 'AttributeController@table',
    'middleware' => 'can:admin.attributes.index',
]);

Route::get('attribute-sets', [
    'as' => 'admin.attribute_sets.index',
    'uses' => 'AttributeSetController@index',
    'middleware' => 'can:admin.attribute_sets.index',
]);

Route::get('attribute-sets/index/table', [
    'as' => 'admin.attribute_sets.table',
    'uses' => 'AttributeSetController@table',
    'middleware' => 'can:admin.attribute_sets.index',
]);

Route::get('attribute-sets/create', [
    'as' => 'admin.attribute_sets.create',
    'uses' => 'AttributeSetController@create',
    'middleware' => 'can:admin.attribute_sets.create',
]);

Route::post('attribute-sets', [
    'as' => 'admin.attribute_sets.store',
    'uses' => 'AttributeSetController@store',
    'middleware' => 'can:admin.attribute_sets.create',
]);

Route::get('attribute-sets/{id}/edit', [
    'as' => 'admin.attribute_sets.edit',
    'uses' => 'AttributeSetController@edit',
    'middleware' => 'can:admin.attribute_sets.edit',
]);

Route::put('attribute-sets/{id}', [
    'as' => 'admin.attribute_sets.update',
    'uses' => 'AttributeSetController@update',
    'middleware' => 'can:admin.attribute_sets.edit',
]);

Route::delete('attribute-sets/{ids?}', [
    'as' => 'admin.attribute_sets.destroy',
    'uses' => 'AttributeSetController@destroy',
    'middleware' => 'can:admin.attribute_sets.destroy',
]);
