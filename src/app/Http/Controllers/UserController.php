<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.manageusers', compact('users'));
    }

    public function create()
    {
        return view('admin.users.adduser');
    }

    public function add(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed:password|required',
            'password_confirmation' => 'required',
            'role_id' => 'required',
        ], [
            'name.required' => '名前',
            'email.required'  => 'メールアドレス',
            'password.required'  => 'パスワード',
            'password.confirmed'  => 'パスワード確認',
            'role_id.required'  => 'ロール',
        ]);

        // レコード追加
        $new_user = new User;
        $new_user->name = $request->input('name');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->role_id = $request->input('role_id');
        $new_user->save();
        return redirect('/admin/manageusers');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->save();
        return redirect('/admin/manageusers');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/admin/manageusers');
    }
}
