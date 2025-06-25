<?php

namespace App\Http\Controllers\CC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Service extends Controller
{
    public function index()
    {
        return view('cc.service.index');
    }
}
