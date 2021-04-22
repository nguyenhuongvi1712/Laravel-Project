<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeAdminController extends Controller
{
    //
    function index(){
        return view('admin.home');
    }
}
