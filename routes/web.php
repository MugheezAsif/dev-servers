<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ServerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'middleware' => 'guest',
    ],
    function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    }
);

Route::group(
    [
        'middleware' => 'auth',
    ],
    function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(
            [
                'prefix' => 'company',
                'as' => 'company.',
            ],
            function () {
                Route::group(
                    [
                        'prefix' => 'domains',
                        'as' => 'domains.',
                    ],
                    function () {
                        Route::get('/', [DomainController::class, 'companyIndex'])->name('index');
                        Route::get('list', [DomainController::class, 'list'])->name('list');
                        Route::get('delete/{id}', [DomainController::class, 'delete'])->name('delete');
                        Route::get('hide/{id}', [DomainController::class, 'hide'])->name('hide');
                        Route::post('/', [DomainController::class, 'store'])->name('store');
                    }
                );

                Route::group(
                    [
                        'prefix' => 'servers',
                        'as' => 'servers.',
                    ],
                    function () {
                        Route::get('/', [ServerController::class, 'companyIndex'])->name('index');
                        Route::get('list', [ServerController::class, 'list'])->name('list');
                        Route::get('delete/{id}', [ServerController::class, 'delete'])->name('delete');
                        Route::get('renew/{id}/{months}', [ServerController::class, 'renew'])->name('renew');
                        Route::get('hide/{id}', [ServerController::class, 'hide'])->name('hide');
                        Route::post('/', [ServerController::class, 'store'])->name('store');
                    }
                );
            }
        );
        

        Route::group(
            [
                'prefix' => 'customer',
                'as' => 'customer.',
            ],
            function () {
                Route::group(
                    [
                        'prefix' => 'domains',
                        'as' => 'domains.',
                    ],
                    function () {
                        Route::get('/', [DomainController::class, 'customerIndex'])->name('index');
                        Route::get('list', [DomainController::class, 'list'])->name('list');
                        Route::get('delete/{id}', [DomainController::class, 'delete'])->name('delete');
                        Route::get('hide/{id}', [DomainController::class, 'hide'])->name('hide');
                        Route::post('/', [DomainController::class, 'store'])->name('store');
                    }
                );

                Route::group(
                    [
                        'prefix' => 'servers',
                        'as' => 'servers.',
                    ],
                    function () {
                        Route::get('/', [ServerController::class, 'customerIndex'])->name('index');
                        Route::get('list', [ServerController::class, 'list'])->name('list');
                        Route::get('delete/{id}', [ServerController::class, 'delete'])->name('delete');
                        Route::get('hide/{id}', [ServerController::class, 'hide'])->name('hide');
                        Route::get('renew/{id}/{months}', [ServerController::class, 'renew'])->name('renew');
                        Route::post('/', [ServerController::class, 'store'])->name('store');
                    }
                );
            }
        );
        
    }
);