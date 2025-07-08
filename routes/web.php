<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('', [App\Http\Controllers\Web\Home::class, 'index'])->name('Web | Home');
Route::get('portfolio-item/{id}', [App\Http\Controllers\Web\Home::class, 'portfolio_item'])->name('Web | Home | Portfolio Item');

Auth::routes(['register' => false]);
Route::get('login', function() { return; })->name('login');

Route::get('/sitemap.xml', function () {
    $urls = [
        'https://kawalgurusinga.com/',
        'https://id.kawalgurusinga.com/',
        'https://en.kawalgurusinga.com/',
    ];

    $lastmod = now()->toDateString();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= "<url>";
        $xml .= "<loc>$url</loc>";
        $xml .= "<lastmod>$lastmod</lastmod>";
        $xml .= "<changefreq>monthly</changefreq>";
        $xml .= "<priority>1.0</priority>";
        $xml .= "</url>";
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
