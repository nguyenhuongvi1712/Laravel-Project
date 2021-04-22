<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoice_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    //
    function show(){
        
        $invoices = Invoice::where('user_id',Auth::user()->id)->get();
        return view('invoice.show',compact('invoices'));
    }
    function show_detail($id){
        if(Invoice::find($id) == null )
            abort(404);
         
        $invoice_details =  DB::table('invoice_details')
        ->join('products', 'products.id', '=', 'invoice_details.product_id')
        ->where('invoice_id',$id)
        ->select('invoice_details.*', 'products.image', 'products.price','products.name')
        ->get();
        $invoice = Invoice::find($id);
        return view('invoice.detail',compact('invoice_details','invoice'));
        
    }
}
