<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $category_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        // ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
        // ->orderBy('tbl_product.product_id','desc')
        // ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand_product.brand_name')
        // ->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')->get();
        
        return view('pages.home')->with('category',$category_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
}
