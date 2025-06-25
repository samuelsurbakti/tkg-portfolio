<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('en.kawalgurusinga.com')->group(function () {
    Auth::routes(['register' => false]);

    Route::get('', [App\Http\Controllers\Web\Home::class, 'index'])->name('Web | Home');
});
