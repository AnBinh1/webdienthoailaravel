<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller{
    public function showForm()
    {
    return view('contact');
    }
    public function send(Request $request)
    {
    // Validate dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Lưu vào database
    Contact::create($request->all());

    // Chuyển hướng với thông báo thành công
    return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi!');
    }


}

