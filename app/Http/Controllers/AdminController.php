<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Hiển thị form đăng nhập
    public function index()
    {
        return view('admin_login');
    }

    // Xử lý đăng nhập
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->first();

        if ($result && Hash::check($admin_password, $result->admin_password)) {

            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);

            return Redirect::to('/dashboard');
        }

        Session::put('message', 'Sai email hoặc mật khẩu. Vui lòng thử lại!');
        return Redirect::to('/admin');
    }

    // Hiển thị dashboard
    public function show_dashboard()
    {
        if (Session::get('admin_id')) {
            return view('admin.dashboard');
        }

        return Redirect::to('/admin');
    }

    // Đăng xuất
    public function logout()
    {
        Session::forget('admin_name');
        Session::forget('admin_id');

        return Redirect::to('/admin');
    }
}