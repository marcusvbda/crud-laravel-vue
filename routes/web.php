<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'news'], function () {
    Route::controller(NewsController::class)->group(function () {
        Route::get('/', 'list')->name('news.list');
        Route::post('/', 'store')->name('news.store');
        Route::get('/{id}', 'findOne')->name('news.find');
        Route::put('/{id}', 'update')->name('news.update');
        Route::delete('/{id}', 'destroy')->name('news.destroy');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
