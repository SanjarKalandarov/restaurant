<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function index(){
     $categories=Category::all();
     return view('categories.index',compact('categories'));
    }

    public  function show($id){

        $categories=Category::find($id);
//dd($categories);
        return view('categories.show',compact('categories'));
    }
}
