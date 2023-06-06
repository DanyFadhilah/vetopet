<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    // landing
    public function index()
    {
        return view('index');
    }

    // Admin
    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/admin/dashboard/home')->with('success', 'Berhasil Login!');
        } else {
            return redirect()->back()->with('error', 'Kami tidak mengenali Anda.');
        }
    }

    // Teacher
    public function loginTeacher()
    {
        return view('login');
    }

    public function postLoginTeacher(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/teacher/checkin');
        } else {
            return redirect()->back()->with('error', 'Kami Tidak dapat menemukan kredensial yang Anda masukkan.');
        }
    }
}
