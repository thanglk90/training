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

$prefixAdmin = config('zvn.url.prefix_admin');

Route::group(['prefix' => $prefixAdmin], function () {
    
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    
    Route::group(['prefix' => $prefix], function () use ($controllerName){
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', 
            ['as' => $controllerName, 'uses' => $controller . 'index']
        );
        
    });

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
        Route::get('delete/{id}', 
            ['as' => $controllerName. '/delete', 'uses' => $controller . 'delete']
        );
        Route::get('change-status-{active}/{id}', 
            ['as' => $controllerName. '/change-status', 'uses' => $controller . 'status']
        );
    });


});
