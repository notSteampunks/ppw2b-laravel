<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //Hak akses utk user yang sudah login oleh admin
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data_user   = User::all();
        $banyak_user = User::count();
        return view('user', compact('data_user','banyak_user'));
    }
}
