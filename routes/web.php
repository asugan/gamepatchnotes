<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', [App\Http\Controllers\GameController::class, 'index'])->name('welcome');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'admin/users'], function () {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'admin/posts'], function () {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });

        /**
         * Games Routes
         */
        Route::group(['prefix' => 'admin/games'], function () {
            Route::get('/', 'AdminGamesController@index')->name('games.index');
            Route::get('/create', 'AdminGamesController@create')->name('games.create');
            Route::post('/create', 'AdminGamesController@store')->name('games.store');
            Route::get('/{post}/show', 'AdminGamesController@show')->name('games.show');
            Route::get('/{post}/edit', 'AdminGamesController@edit')->name('games.edit');
            Route::patch('/{post}/update', 'AdminGamesController@update')->name('games.update');
            Route::delete('/{post}/delete', 'AdminGamesController@destroy')->name('games.destroy');
        });

        /**
         * Patchnotes Routes
         */
        Route::group(['prefix' => 'admin/patchnotes'], function () {
            Route::get('/', 'AdminPostController@index')->name('patchnotes.index');
            Route::get('/create', 'AdminPostController@create')->name('patchnotes.create');
            Route::post('/create', 'AdminPostController@store')->name('patchnotes.store');
            Route::get('/{post}/show', 'AdminPostController@show')->name('patchnotes.show');
            Route::get('/{post}/edit', 'AdminPostController@edit')->name('patchnotes.edit');
            Route::patch('/{post}/update', 'AdminPostController@update')->name('patchnotes.update');
            Route::delete('/{post}/delete', 'AdminPostController@destroy')->name('patchnotes.destroy');
        });

        /**
         * Admin Routes
         */
        Route::get('/admin', 'HomeController@index')->name('home.index');

        Route::resource('admin/roles', RolesController::class);
        Route::resource('admin/permissions', PermissionsController::class);
        Route::post('/like-post/{id}', [App\Http\Controllers\GameController::class, 'LikePost'])->name('like.post');
        Route::post('/unlike-post/{id}', [App\Http\Controllers\GameController::class, 'UnlikePost'])->name('unlike.post');
    });
});

Route::get('/patchnote/{patchnote}', [App\Http\Controllers\GameController::class, 'showpatchnote'])->name('show');
Route::get('/game/{game}', [App\Http\Controllers\GameController::class, 'showcategory'])->name('showcg');