@extends('layouts.app')

@section('content')
    <div class="admin_container">
        <h2>学習言語追加</h2>
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
            <input id="new_name" name="name" type="text">
          </div>
          <div>
            <label for="new_color">グラフにおける色</label>
            <input id="new_color" name="color" type="color">
          </div>
            <input type="submit" class="btn btn-success" value="コンテンツ追加">
        </form>
    </div>
@endsection

