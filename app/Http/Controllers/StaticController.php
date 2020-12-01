<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function aboutUs(){
        return view('static.about');
    }
    public function faq(){
        return view('static.faq');
    }
}
