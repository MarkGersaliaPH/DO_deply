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

Route::get('/','TaskController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate'); 

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('items', 'Admin\ItemsController', ["as" => 'admin']);
});

  

Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', 'Admin\CategoryController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subCategories', 'Admin\SubCategoryController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('subCategories', 'Admin\SubCategoryController', ["as" => 'admin']);
});


Route::resource('orders', 'OrderController');
Route::get('widgets/sales/{month?}/{year?}', 'WidgetsController@sales');

Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});


Route::get('/crud','CrudController@index');
<<<<<<< HEAD
Route::get('/crud/sort/{days}/{month}','CrudController@sorted');
=======
Route::get('/crud/sort/{month}/{days}','CrudController@sorted');
>>>>>>> b78006be52c44c0f921c5ee9f514c1ec87090fed
Route::get('/crud/edit/{id}','CrudController@edit');
Route::match(['put', 'patch'], '/crud/update/{id}','CrudController@update');
Route::get('/crud/delete/{id}','CrudController@destroy');
Route::get('/crud/view/{id}','CrudController@view');
Route::post('/crud/create','CrudController@create');
Route::get('/crud/save-time/{id}/{time}','CrudController@saveTime');
Route::get('/crud/complete/{id}/','CrudController@complete');
Route::get('/crud/testing/{task}/','CrudController@for_testing');
Route::get('/crud/update/status/{task}/','CrudController@update_status');
Route::get('/crud/update/progress/{id}/{progress}','CrudController@updateProgress');

// B3nt4h4n
// mysql username: admindb@bentahan/bentahan