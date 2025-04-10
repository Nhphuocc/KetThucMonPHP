<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tensach;
use App\Models\tacgia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted',
        ], [
            'terms.accepted' => 'Bạn phải đồng ý với điều khoản.',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Auth::login($user);
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }



    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(auth()->user()->is_admin == true)
                return redirect('/admin')->with('success', 'Đăng nhập thành công!');
            else
                return redirect('/home')->with('success', 'Đăng nhập thành công!');
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Bạn đã đăng xuất.');
    }



    public function home()
    {

        $danhsach_sach = tensach::with('tacgia')->get();
        return view('home', compact('danhsach_sach'));
    }
    public function showchitiet($id)
    {
        $sach = tensach::findOrFail($id);
        return view('chitiet', compact('sach'));
    }


    public function admin()
    {
        $danhsach_sach = tensach::with('tacgia')->get();
        $danhsach_tacgia = tacgia::all();
        return view('admin', compact('danhsach_sach','danhsach_tacgia'));
    }


    public function destroy($id)
    {
    $sach = tensach::findOrFail($id);
    $sach->delete();
    return redirect()->route('admin')->with('success', 'Đã xoá sách thành công!');
    }




    public function edit($id)
{
    $sach = tensach::findOrFail($id);
    $tacgiaList = tacgia::all();
    return view('editbook', compact('sach', 'tacgiaList'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'ten' => 'required|string|max:255',
        'tacgia_id' => 'required|exists:tacgia,id',
    ]);

    $sach = tensach::findOrFail($id);
    $sach->ten = $request->ten;
    $sach->tacgia_id = $request->tacgia_id;
    $sach->save();
    return redirect()->route('admin')->with('success', 'Đã cập nhật sách thành công!');
}
}



