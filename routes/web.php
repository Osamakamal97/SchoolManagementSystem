<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Auth::routes();
});

// Route::get('change-lang', [DashboardController::class,'changeLang'])->name('changeLang');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::post('classrooms/filter', 'ClassroomController@gradeFilter')->name('classrooms.gradeFilter');
        Route::resources([
            'grades' => GradeController::class,
            'classrooms' => ClassroomController::class,
        ]);
        Route::get('logout', function () {
            Auth::logout();
            return view('auth.login');
        });
    }
);
