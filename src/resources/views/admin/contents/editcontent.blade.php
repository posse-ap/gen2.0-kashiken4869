@extends('layouts.app')

@section('content')
    <div class="admin_container">
        <h2>学習コンテンツ編集</h2>
        @if ($errors->any())
            <p class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach を記入してください。
            </p>
        @endif
        @if (session()->has('fail'))
            <p class="alert alert-danger">{{ session('alert') }}</p>
        @endif
        <form action="" method="POST">
            @csrf
            <div>
                <label for="new_name">名前</label>
                <input id="new_name" name="name" type="text" value="{{ $content->name }}">
            </div>
            <div>
                <label for="new_color">グラフにおける色</label>
                <input id="new_color" name="color" type="text" value="{{ $content->color }}">
            </div>
            <input type="submit" class="btn btn-success" value="コンテンツ更新">
            <a href="/admin/deletecontent/{{ $content->id }}" class="btn btn-danger">削除</a>
    </div>
@endsection
