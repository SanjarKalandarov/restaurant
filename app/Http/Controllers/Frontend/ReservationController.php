<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public  function stepOne(){

    }
    public  function stepTwo($id){
        return 'reser ttwo'.$id;
    }
}
