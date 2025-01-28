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
                        Route::get('delete/{id}', [DomainController::class, 'delete'])->name('delete');
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
                    }
                );

                Route::group(
                    [
                        'prefix' => 'servers',
                        'as' => 'servers.',
                    ],
                    function () {
                        Route::get('/', [ServerController::class, 'customerIndex'])->name('index');
                    }
                );
            }
        );
        
    }
);