<?php

namespace App\Http\Controllers\Web;

use App\Models\Work;
use App\Models\SeoMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class Home extends Controller
{
    public function index()
    {
        $seo = SeoMetadata::where('slug', 'home')->first();
        $locale = app()->getLocale(); // ditentukan lewat subdomain oleh middleware kamu

        if ($seo) {
            SEOTools::setTitle($seo->title[$locale] ?? '');
            SEOTools::setDescription($seo->description[$locale] ?? '');
            SEOTools::metatags()->addKeyword(explode(',', $seo->keywords[$locale] ?? ''));
        }

        return view('web.home.index');
    }

    public function portfolio_item($id)
    {
        $portfolio = Work::findOrFail($id);
        return view('web.home.portfolio-item', compact('portfolio'));
    }
}
