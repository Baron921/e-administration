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





/*USER ROUTE*/

Route::get('/', 'HomeController@index')->name('index');


/* ADMIN ROUTE */


Route::middleware('auth')->group(function (){

    Route::group([
        'middleware' => 'App\Http\Middleware\Role'
    ], function (){

        Route::get('admin/categorie', 'CategorieController@index')->name('categorie.index');
        Route::post('admin/store_categorie', 'CategorieController@store')->name('categorie.store');
        Route::put('admin/update_categorie/{id}', 'CategorieController@update')->name('categorie.update');
        Route::get('admin/delete_categorie/{id}', 'CategorieController@destroy')->name('categorie.destroy');

        Route::get('admin/institution', 'UserController@index')->name('institution.index');
        Route::post('admin/institution/store', 'UserController@store')->name('institution.store');
        Route::put('admin/institution/update/{id}', 'UserController@update')->name('institution.update');
        Route::get('admin/institution/delete/{id}', 'UserController@destroy')->name('institution.destroy');
        Route::post('admin/institution/create', 'UserController@create')->name('institution.create');

    });


    Route::get('admin/piece', 'PieceController@index')->name('piece.index');
    Route::post('admin/piece/store', 'PieceController@store')->name('piece.store');
    Route::put('admin/piece/update/{id}', 'PieceController@update')->name('piece.update');
    Route::get('admin/piece/destroy/{id}', 'PieceController@destroy')->name('piece.destroy');
    Route::post('admin/piece/create', 'PieceController@create')->name('piece.create');

    Route::get('admin/type', 'TypeController@index')->name('type.index');
    Route::post('admin/type/store', 'TypeController@store')->name('type.store');
    Route::put('admin/type/update/{id}', 'TypeController@update')->name('type.update');
    Route::get('admin/type/destroy/{id}', 'TypeController@destroy')->name('type.destroy');

    Route::get('admin/operation', 'OperationController@index')->name('operation.index');
    Route::post('admin/operation/store', 'OperationController@store')->name('operation.store');
    Route::put('admin/operation/update/{id}', 'OperationController@update')->name('operation.update');
    Route::get('admin/operation/destroy/{id}', 'OperationController@destroy')->name('operation.destroy');

    Route::get('admin/operation/list', 'OperationController@show')->name('operation.listOperation');

    Route::get('admin/operation/{categorie}/{nom}', 'OperationController@categorisation')->name('operation.category');

    Route::put('admin/user/update/{id}', 'HomeController@update')->name('user.update');

    Route::get('admin/a_propos', 'HomeController@about')->name('aPropos.about');

    Route::get('admin/profile', 'HomeController@profile')->name('user.profile');

    Route::get('admin/help', 'HomeController@help')->name('admin.help');

});

    Auth::routes();

    Route::get('/admin', 'HomeController@index')->name('home');

    Route::get('admin/welcome', 'Auth\RegisterController@welcome')->name('welcome');

    Route::get('/acte/accueil', 'ActeController@index')->name('acte.index');


    Route::get('/acte/operations', 'ActeController@administration')->name('acte.operation');

    Route::get('/acte/operations/type', 'ActeController@type')->name('acte.type');

    Route::get('/acte/operations/theme', 'ActeController@theme')->name('acte.theme');


    Route::get('/acte/operations/administration/{id}/{institution}', 'ActeController@show')->name('acte.institution');

    Route::get('/acte/operations/categorie/{id}/{categorie}', 'ActeController@show')->name('acte.categorie');

    Route::get('/acte/operations/toutes/{id}/{rename}', 'ActeController@all')->name('acte.all');

    Route::get('/acte/operations/type/{num}/{nom}', 'ActeController@show')->name('type.nom');

    Route::get('/acte/operations/{nom}/{slug}', 'ActeController@operation')->name('details');


    //Route::get('/acte/type/{id}/{type}', 'ActeController@show')->name('administration.type');


    //Route::get('acte/operation/{id}/{operation}/{slug}', 'ActeController@operation')->name('acte.operation');
