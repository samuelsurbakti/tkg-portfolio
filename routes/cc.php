<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::domain('cc.kawalgurusinga.com')->group(function () {
    Auth::routes(['register' => false]);

    Route::get('/', function () {
        return redirect(route('CC | Home'));
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::prefix('profile')->group(function () {
            Route::get('', [App\Http\Controllers\CC\Profile::class, 'index'])->name('CC | Profile');
        });

        Route::group(['middleware' => ['permission:Beranda'], 'prefix' => 'home'], function () {
            Route::get('', [App\Http\Controllers\CC\Home::class, 'index'])->name('CC | Home');
        });

        Route::group(['middleware' => ['permission:Layanan'], 'prefix' => 'service'], function () {
            Route::get('', [App\Http\Controllers\CC\Service::class, 'index'])->name('CC | Service');
        });

        Route::group(['middleware' => ['permission:Pendidikan'], 'prefix' => 'education'], function () {
            Route::get('', [App\Http\Controllers\CC\Education::class, 'index'])->name('CC | Education');
        });

        Route::group(['middleware' => ['permission:Pengalaman'], 'prefix' => 'experience'], function () {
            Route::get('', [App\Http\Controllers\CC\Experience::class, 'index'])->name('CC | Experience');
        });

        Route::group(['middleware' => ['permission:Pekerjaan'], 'prefix' => 'work'], function () {
            Route::get('', [App\Http\Controllers\CC\Work::class, 'index'])->name('CC | Work');
        });

        Route::group(['middleware' => ['permission:Klien'], 'prefix' => 'client'], function () {
            Route::get('', [App\Http\Controllers\CC\Client::class, 'index'])->name('CC | Client');
        });

        Route::group(['middleware' => ['permission:Akun'], 'prefix' => 'account'], function () {
            Route::get('', [App\Http\Controllers\CC\Account::class, 'index'])->name('CC | Account');
        });

        Route::group(['middleware' => ['permission:Sistem'], 'prefix' => 'system'], function () {
            Route::get('', [App\Http\Controllers\CC\System::class, 'index'])->name('CC | System');
        });

        Route::prefix('table')->group(function () {
            Route::prefix('work')->group(function () {
                Route::get('category', [App\Http\Controllers\CC\Work::class, 'category_dt'])->name('Table | CC | Work | Category');
            });

            Route::prefix('account')->group(function () {
                Route::get('', [App\Http\Controllers\CC\Account::class, 'dt'])->name('Table | CC | Account');
            });

            Route::prefix('system')->group(function () {
                Route::get('', [App\Http\Controllers\CC\System::class, 'permission_dt'])->name('Table | CC | System | Permission');
            });
        });
    });
});
