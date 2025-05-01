<?php

namespace App\Http\Controllers;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CategoryProductController extends Controller
{
    //
    public function add_category_product(){
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','thêm danh mục sản phẩm thành công');
        return Redirect::to('add_category_product');
    }
    // public function unactive_category_product($category_product_id)
    // {
    //     DB::table('tbl_category_product')
    //         ->where('category_id', $category_product_id)
    //         ->update(['category_status' => 0]);

    //     Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công');
    //     return Redirect::to('all_category_product');
    // }
    // public function active_category_product($category_product_id)
    // {
    //     DB::table('tbl_category_product')
    //         ->where('category_id', $category_product_id)
    //         ->update(['category_status' => 1]);

    //     Session::put('message', 'kích hoạt danh mục sản phẩm thành công');
    //     return Redirect::to('all_category_product');
    // }
    public function edit_category_product($category_product_id){
        // Sử dụng first() thay vì get() để lấy một bản ghi duy nhất
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->first();
    
        // Truyền dữ liệu vào view
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message',"cập nhật danh mục sản phẩm thành công");
        return Redirect::to('all_category_product');
    }
    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message',"Xoá danh mục sản phẩm thành công");
        return Redirect::to('all_category_product');
    }
}   
