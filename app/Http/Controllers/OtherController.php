<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        return view("other");
    }
    public function __construct(){
        $this->middleware('auth');
    }
}
