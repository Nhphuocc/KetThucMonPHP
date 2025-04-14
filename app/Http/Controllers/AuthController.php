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
        return view('page/register');
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
        return view('page/login');
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
        return view('page/home', compact('danhsach_sach'));
    }
    public function showchitiet($id)
    {
        $sach = tensach::findOrFail($id);
        return view('book/chitiet', compact('sach'));
    }


    public function admin()
    {
        $danhsach_sach = tensach::with('tacgia')->get();
        $danhsach_tacgia = tacgia::all();
        return view('admin/admin', compact('danhsach_sach','danhsach_tacgia'));
    }
    public function showTacGia()
    {
        $danhsach_tacgia = tacgia::all();
        return view('admin/tacgia', compact('danhsach_tacgia'));
    }
    public function showUser()
    {
        $user = user::all();
        return view('admin/user', compact('user'));
    }



    public function destroySach($id)
    {
    $sach = tensach::findOrFail($id);
    $sach->delete();
    return redirect()->route('admin')->with('success', 'Đã xoá thành công!');
    }

    public function destroyTacgia($id)
    {
    $tacgia = tacgia::findOrFail($id);
    $tacgia->delete();
    return redirect()->route('showTacGia')->with('success', 'Đã xoá thành công!');
    }





    public function edit($id)
{
    $sach = tensach::findOrFail($id);
    $tacgiaList = tacgia::all();
    return view('book/editbook', compact('sach', 'tacgiaList'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'tenmoi' => 'required|string|max:255',
        'tacgia_id' => 'required|exists:tacgia,id',
    ]);

    $sach = tensach::findOrFail($id);
    $sach->ten_sach = $request->tenmoi;
    $sach->tacgia_id = $request->tacgia_id;
    $sach->save();
    return redirect()->route('admin')->with('success', 'Đã cập nhật sách thành công!');
}


public function editTacGia($id)
{
    $tacgia = tacgia::findOrFail($id);
    return view('tacgia.editTacGia', compact('tacgia'));
}

public function updateTacGia(Request $request, $id)
{
    $request->validate([
        'tentacgia' => 'required|string|max:255',
    ]);

    $tacgia = tacgia::findOrFail($id);
    $tacgia->name = $request->tentacgia;
    $tacgia->save();

    return redirect()->route('showTacGia')->with('success', 'Cập nhật tác giả thành công!');
}



public function showcreatebook()
{
    $tacgiaList = tacgia::all();
    return view('book.addbook', compact('tacgiaList'));
}
public function createBook(Request $request)
{
    $request->validate([
        'ten_sach' => 'required|string|max:255',
        'tacgia_id' => 'required|exists:tacgia,id',
        'Noi_dung' => 'required|string',
    ]);

    $sachmoi = new tensach();
    $sachmoi->ten_sach = $request->ten_sach;
    $sachmoi->tacgia_id = $request->tacgia_id;
    $sachmoi->Noi_dung = $request->Noi_dung;
    $sachmoi->save();
    return redirect()->route('admin')->with('success', 'Đã thêm sách thành công!');
}
}




