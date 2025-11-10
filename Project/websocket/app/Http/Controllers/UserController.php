<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showHelpers(){
        return view('welcome');
    }
}
