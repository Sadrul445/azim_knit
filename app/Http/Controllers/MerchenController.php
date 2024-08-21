<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchenController extends Controller
{
    public function index(){
        return view('merchant.dashboard');
    }
}
