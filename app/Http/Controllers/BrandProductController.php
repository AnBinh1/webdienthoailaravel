<?php

namespace App\Http\Controllers;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BrandProductController extends Controller
{
    //
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add_brand_product');
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
    public function edit_brand_product($brand_product_id){
        // Sử dụng first() thay vì get() để lấy một bản ghi duy nhất
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->first();
    
        // Truyền dữ liệu vào view
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_product_id){
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message',"cập nhật danh mục sản phẩm thành công");
        return Redirect::to('all_brand_product');
    }
    public function delete_brand_product($brand_product_id){
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message',"Xoá thương hiệu sản phẩm thành công");
        return Redirect::to('all_brand_product');
    }
}
