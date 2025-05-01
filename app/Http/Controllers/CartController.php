<?php

namespace App\Http\Controllers;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $productId = $request -> productId_hidden;
        $quantity = $request -> qty;
        $data = DB::table('tbl_product')->where('product_id',$productId)->get();
        return view("pages.cart.show_cart")->with('category',$category_product)->with('brand',$brand_product);
    }
    
}
