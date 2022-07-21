<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(Request $request)
    {
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('pw')
        ];
        if (Auth::attempt($login)) {
            $user = Auth::user();
            Session::put('user', $user);
            echo '<script>alert("Đăng nhập thành công.");window.location.assign("/");</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại.");window.location.assign("login");</script>';
        }
    }
    public function Logout()
    {
        Session::forget('user');
        Session::forget('cart');
        return redirect('/');
    }
    public function postSingUp(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'fullname'=>'required',
            'password' => 'required|min:6|max|20',
            'c_password' => 'required|same:password'
        ],[
            'name.required'=>'Vui lòng nhập email',
            'name.email'=>'không đúng định dạng email',
            'name.unique'=>'email đã có người sử dụng',
            'password.required'=>'vui lòng nhập mật khẩu',           
            'fullname.required'=>'bạn chưa nhập tên',   
            'c_password.min'=>'mật khẩu ít nhất 6 ký tự'
        ]);
        $input['password'] = bcrypt($input['password']);
        User::create($input);

        echo '<script>alert("Đăng ký thành công. Vui lòng đăng nhập.");window.location.assign("login");</script>';
    }
}
