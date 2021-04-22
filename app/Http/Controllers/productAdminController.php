<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productAdminController extends Controller
{
    //
    function create(){
        return view('admin.product.create');
    }
}
