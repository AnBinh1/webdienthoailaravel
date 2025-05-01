<?php

namespace App\Http\Controllers;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //
    public function add_product(){
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        
        return view('admin.add_product')
            ->with('category_product', $category_product)
            ->with('brand_product',$brand_product);
    }
    
    public function all_product() {
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
            ->orderBy('tbl_product.product_id','desc')
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand_product.brand_name')
            ->get();
    
        return view('admin.all_product')->with('all_product', $all_product);
    }
    
    
    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        $get_image =$request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); // ví dụ: iphone15.jpg
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); // iphone15
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','thêm sản phẩm thành công');
            return Redirect::to('add_product');
        }
        $data['product_image'] ='';
        DB::table('tbl_product')->insert($data);
        Session::put('message','thêm sản phẩm thành công');
        return Redirect::to('all_product');
    }
    // public function unactive_brand_product($brand_product_id)
    // {
    //     DB::table('tbl_brand_product')
    //         ->where('brand_id', $brand_product_id)
    //         ->update(['brand_status' => 0]);

    //     Session::put('message', 'Không kích hoạt thương hiệu sản phẩm thành công');
    //     return Redirect::to('all_brand_product');
    // }
    // public function active_brand_product($brand_product_id)
    // {
    //     DB::table('tbl_brand_product')
    //         ->where('brand_id', $brand_product_id)
    //         ->update(['brand_status' => 1]);

    //     Session::put('message', 'kích hoạt thương hiệu sản phẩm thành công');
    //     return Redirect::to('all_brand_product');
    // }
    public function edit_product($product_id){
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
        
        // Sử dụng first() thay vì get() để lấy một bản ghi duy nhất
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
    
        // Truyền dữ liệu vào view
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)
        ->with('category_product',$category_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all_product');
    }

    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message',"Xoá sản phẩm thành công");
        return Redirect::to('all_product');
    }
    //end product pages
    public function Details_product($product_id){
        $category_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
    
        // Thêm đoạn này để lấy chi tiết sản phẩm
        $product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_id', $product_id)
            ->select('tbl_product.*', 'tbl_category_product.category_name', 'tbl_brand_product.brand_name')
            ->first();
        
        return view('pages.sanpham.show_details')
            ->with('category', $category_product)
            ->with('brand', $brand_product)
            ->with('product', $product); // Truyền biến product vào view
    }
    
}
