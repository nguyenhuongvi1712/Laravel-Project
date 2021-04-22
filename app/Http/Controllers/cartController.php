<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class cartController extends Controller
{
    //
    function show(){
        $carts = Cart::content();
        return view('cart.show',compact('carts'));
    }

    function add(Request $request){
        $data = $request->all();
        $product_id = $data['id'];
        $product = Product::find($product_id);
        $data = array(
            'num' => Cart::count()
        );
                                    
        if (!empty($product)) {
            Cart::add($request->id, $product->name,1, $product->price,['image'=>$product->image],0);
            $num_of_cart = Cart::count();
            $total_price = Cart::total();
            $string = "";
            foreach(Cart::content() as $item){
                $string = $string . "<li class=\"clearfix\">".
                "<a href=".url('products/'.$item->id)." class=\"thumb fl-left\">".
                    "<img src='".asset($item->options['image'])."'></a>".
                "<div class=\"info fl-right\">".
                    "<a href=\"".url('products/'.$item->id)." class=\"product-name\">".$item->name."</a>".
                    "<p class=\"price\">".number_format($item->price,0,',','.')."</p>".
                    "<p class=\"qty\">Số lượng: <span>".$item->qty."</span></p>".
                "</div>".
            "</li>";
            }
            $data = array(
            'num' => $num_of_cart,
            'total_price' => $total_price,
            'string' => $string
            );
        }
        echo json_encode($data);   
    }

    function add_product(Request $request){
        $product = Product::find($request->id);
        $quantity = $request->get('quantity');
        Cart::add($request->id, $product->name, $quantity, $product->price,['image'=>$product->image],0);
        return redirect()->route('cart.show');
    }

    function remove($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart.show');
    }

    function update(Request $request){
        $data = $request->all();
        $product_id = $data['id'];
        $product_qty = $data['qty'];
        $rowId = $data['rowId'];
        $product = Product::find($product_id);
        if (!empty($product)) {
            Cart::update($rowId, $product_qty);
            $price = $product['price'];
            $sub_total = $price * $product_qty;
            $total_price = Cart::total();
            $num_of_cart = Cart::count();
            $data = array(
            'sub_total' => $sub_total,
            'total_price' => $total_price,
            'num' => $num_of_cart
            );
        }
        else{
            $data = array(
                'total_price' => Cart::total(),
                'num' => Cart::count()
            );
        }
        echo json_encode($data);
    }

    function destroy(){
        Cart::destroy();
        return redirect()->route('cart.show');
    }

    function show_checkout(){
        return view('cart.checkout');
    }

    function checkout(Request $request){
        $request -> validate([
            'fullname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:400'],
            'phone' => 'required|regex:/^0[0-9]{9,10}+$/',
        ]);

        $i = $request->all();
        $user_id = null;
        $voucher_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        $invoice = Invoice::create([
            'total_price' => Cart::total(0,'',''),
            'address' => $i['address'],
            'tel' => $i['phone'],
            'notes' => $i['note'],
            'created_dateTime' => now(),
            'status' => 0,
            'user_id' => $user_id,
            'customer_name' => $i['fullname']
        ]);
        foreach(Cart::content() as $item){
            $invoice_detail = Invoice_details::create([
                'product_id' => $item->id,
                'invoice_id' => $invoice->id,
                'quantity' => $item->qty
            ]);
        };
        Cart::destroy();
        if(Auth::check()){
            Mail::to(Auth::user()->email)->send(new OrderShipped($invoice));
            return redirect() -> route('invoices.show') ->with ('success','Đặt hàng thành công.Xin chờ để admin xác nhận !');
        }
        return redirect('/') ->with ('success','Đặt hàng thành công.Xin chờ để admin xác nhận !');
    }

   
}
