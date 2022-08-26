<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $specials=Category::first();
//        dd($specials->image);
        return view('welcome',compact('specials'));
    }
}

