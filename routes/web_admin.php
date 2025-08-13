<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;


Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('dashboard');
                Route::controller(PlaceController::class)
                    ->prefix('places')
                    ->name('places.')
                    ->group(function () {
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');

                        Route::get('', 'index')->name('index');
                        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
                    });

                Route::controller(CategoryController::class)
                    ->prefix('categories')
                    ->name('categories.')
                    ->group(function () {
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');

                        Route::get('', 'index')->name('index');
                        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
                    });

                Route::controller(BannerController::class)
                    ->prefix('banners')
                    ->name('banners.')
                    ->group(function () {
                        Route::get('create', 'create')->name('create');
                        Route::post('', 'store')->name('store');
                        Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                        Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                        Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');

                        Route::get('', 'index')->name('index');
                        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
                    });

            });
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
