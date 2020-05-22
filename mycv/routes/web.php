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

Route::get('me', 'meController@index');

$prefixAdmin = config('zvn.url.prefix_admin');
$prefixNews = config('zvn.url.prefix_news');

// =================== ADMIN ===========================
Route::group(['prefix' => $prefixAdmin], function () {
    // =================== DASHBOARD ===========================
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', 
            ['as' => $controllerName, 'uses' => $controller . 'index']
        );
        
    });

    // =================== SLIDER ===========================
    $prefix = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', 
            ['as' => $controllerName, 'uses' => $controller . 'index']
        );
        Route::get('form/{id?}', 
            ['as' => $controllerName. '/form', 'uses' => $controller . 'form']
        );
        Route::post('save', 
            ['as' => $controllerName. '/save', 'uses' => $controller . 'save']
        );
        Route::get('delete/{id}', 
            ['as' => $controllerName. '/delete', 'uses' => $controller . 'delete']
        );
        Route::get('change-status-{status}/{id}', 
            ['as' => $controllerName. '/status', 'uses' => $controller . 'status']
        );
    });

    // =================== CATEGORY ===========================
    $prefix = 'category';
    $controllerName = 'category';
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', 
            ['as' => $controllerName, 'uses' => $controller . 'index']
        );
        Route::get('form/{id?}', 
            ['as' => $controllerName. '/form', 'uses' => $controller . 'form']
        );
        Route::post('save', 
            ['as' => $controllerName. '/save', 'uses' => $controller . 'save']
        );
        Route::get('delete/{id}', 
            ['as' => $controllerName. '/delete', 'uses' => $controller . 'delete']
        );
        Route::get('change-status-{status}/{id}', 
            ['as' => $controllerName. '/status', 'uses' => $controller . 'status']
        );
        Route::get('change-status-{is_home}/{id}', 
            ['as' => $controllerName. '/isHome', 'uses' => $controller . 'isHome']
        );
    });

});

// =================== FRONT END ===========================
Route::group(['prefix' => $prefixNews], function () {
    
    // =================== HOME ===========================
    $prefix = '';
    $controllerName = 'home';
    
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', 
            ['as' => $controllerName, 'uses' => $controller . 'index']
        );
        
    });



});
