@extends('layouts.app')

@section('content')
    <div class="admin_container">
        <h2>ユーザー編集</h2>
        @if ($errors->any())
            <p class="alert alert-danger">@foreach ($errors->all() as $error) {{ $error }} @endforeach を記入してください。</p>
        @endif
        @if (session()->has('fail'))
            <p class="alert alert-danger">{{ session('alert') }}</p>
        @endif
        <form action="" method="POST">
        @csrf 
          <div>
            <label for="new_name">名前</label>
            <input id="new_name" name="name" type="text" value="{{ $user->name }}">
          </div>
          <div>
            <label for="new_email">メール</label>
            <input id="new_email" name="email" type="text" value="{{ $user->email }}">
          </div>
          {{-- <div>
            <label for="new_password">パスワード</label>
            <input id="new_password" name="password" type="password">
          </div>
          <div>
            <label for="new_password_conf">パスワード確認</label>
            <input id="new_password_conf" name="password_confirmation" type="password">
          </div> --}}
          <div>
            <label for="new_role">ロール選択</label>
            <input id="new_role" name="role_id" type="number" value={{ $user->role_id }}>
          </div>
            <input type="submit" class="btn btn-success" value="ユーザー更新">
            <a href="/admin/deleteuser/{{ $user->id }}" class="btn btn-danger">削除</a>
    </div>
@endsection

