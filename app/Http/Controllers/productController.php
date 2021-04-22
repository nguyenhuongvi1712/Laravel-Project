<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productController extends Controller
{
    //
    function show($id){
        $product = Product::find($id);
        if(empty($product))
            abort(404);
        $category_name = Product::find($id)->Category;
        $products = Product::where([
            ['id','!=',$id],
            ['category_id',$product->category_id]
        ])->get();
        return view('product.product-detail',compact('product','products','category_name'));
    }
    function show_list($category_name){ 
        $id = 0 ;
        $category_name = Str::of($category_name)->replace('-',' ');
        $category = Category::where('name',$category_name)->first();
        if(!empty($category))
            $id = $category->id;
        else
            abort(404);
        Paginator::useBootstrap();
        $products = Product::where('category_id',$id)->paginate(12);
        $count = Product::where('category_id',$id)->count();
        return view('product.product-category-list',compact('products','category_name','count'));
    }

    function search(Request $request){
        $data = $request->all();
        $keyWord = $data['keyWord'];
        $keyWord = Str::of($data['keyWord'])->replace('\'','');
        $pattern = "/[0-9]/";
        if (preg_match($pattern, $keyWord)){
            $data = Product::where('id',$keyWord)->get();
        }
        else{
            $keyWordLower = strtolower($keyWord);
            $data = DB::table('products')->whereRaw("lower(romaji_name) like '%".$keyWordLower."%'")->orWhere('name','like','%'.$keyWordLower.'%')->get();
        }
        $listSearch = "";
        if (count($data)) {
            $listSearch = $listSearch."<ul>";
            $i=0;
            foreach ($data as $val) {
                $i++;
                if($i<=8)
                    $listSearch = $listSearch."<li class=\"clearfix\"><a class=\"thumb fl-left\" href=\"".route('product.show',$val->id)."\"><img src=\"".asset($val->image)."\"></a><div class=\"info fl-right\"><a class=\"title\" href=\"".route('product.show',$val->id)."\">{$val->name}</a><span class=\"romaji_name\">{$val->romaji_name}</span><span class=\"price\">{$val->price}</span></div></li>";
                else
                    break;
            }
            if(count($data)>8){
                $listSearch = $listSearch."<li class=\"clearfix see-more\"><a  href=\"".route('product.searchGet',$keyWord)."\">See more</a></li>";
            }
            $listSearch = $listSearch."</ul>";
        }
        else{
            $listSearch = "<ul><li>Không có kết quả tìm kiếm</li><ul>";
        }
        echo json_encode($listSearch);
    }
    function test(){
        $keyWordLower = 'salmon';
        $data = DB::table('products')->whereRaw("lower(romaji_name) like '%".$keyWordLower."%'")->orWhere('name','like','%'.$keyWordLower.'%')->limit(10)->get();
        echo count($data);
        //return $data;
    }
    function searchGet($keyWord)
    {
        $str = htmlentities($keyWord);
        $token = Str::of($str)->replace('\'', '');
        str_replace("<", "&gt;", $str);
        str_replace(">", "&lt;", $str);
        str_replace("'", "&apos;", $str);
        str_replace("\"", "&quot;", $str);
        str_replace("&", "&amp;", $str);
        $keyWordLower = strtolower($token);
        $products = DB::table('products')->whereRaw("lower(romaji_name) like '%".$keyWordLower."%'")->orWhere('name', 'like', '%'.$keyWordLower.'%')->paginate(12);
        $count = DB::table('products')->whereRaw("lower(romaji_name) like '%".$keyWordLower."%'")->orWhere('name', 'like', '%'.$keyWordLower.'%')->count();
        Paginator::useBootstrap();
        return view('product.search', compact('products', 'str', 'count'));
    }
    function home(){
        for($i = 1 ;$i <= 12 ;$i++){
            $products[$i]['list'] = Product::where('category_id',$i)->limit(8)->get(); 
        }
        $products[1]['name']= 'Sashimi';
        $products[2]['name']= 'Special Roll';
        $products[3]['name']= 'Nigiri Sushi';
        $products[4]['name']= 'Gunkan Sushi';
        $products[5]['name']= 'Makimono';
        $products[6]['name']= 'Temaki Sushi';
        $products[7]['name']= 'Udon & Ramen';
        $products[8]['name']= 'Bento';
        $products[9]['name']= 'Hot Food';
        $products[10]['name']= 'Appetizer';
        $products[11]['name']= 'Drink';
        $products[12]['name']= 'Dessert';
    
        $bsl = DB::table('invoice_details')
             ->select(DB::raw('sum(quantity), product_id'))->orderBy('sum','desc')
             ->groupBy('product_id')
             ->limit(5)
             ->get();
        $id = [];
        foreach($bsl as $item){
            array_push($id,$item->product_id);
        }
        // return $id;
        $bsl = DB::table('products')
        ->whereIn('id', $id)
        ->get();
        return view('home',compact('products','bsl'));
    }
}
