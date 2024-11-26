<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    //
    public function create(Request $request){
        return view("auth.signup");
    }
}
