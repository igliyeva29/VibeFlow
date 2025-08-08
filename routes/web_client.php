<?php

use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where('locale', '[a-z]+');
    });

Route::middleware('guest')
    ->group(function () {
        Route::controller(PlaceController::class)
            ->prefix('places')
            ->name('places.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9\-]+');
            });
    });