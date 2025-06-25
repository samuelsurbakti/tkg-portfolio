<?php

namespace App\Http\Controllers\CC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Experience extends Controller
{
    public function index()
    {
        return view('cc.experience.index');
    }
}
