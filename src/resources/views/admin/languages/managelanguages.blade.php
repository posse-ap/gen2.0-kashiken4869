@extends('layouts.app')

@section('content')
    <div class="admin_container">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/manageusers">ユーザー管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/managecontent">コンテンツ管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">学習言語管理</a>
                </li>
            </ul>
        </nav>
        <form action="" method="POST">
            @csrf
            <table>
                <tr>
                    <th>コンテンツ名称</th>
                    <th>グラフにおける色</th>
                </tr>
                @foreach ($languages as $language)
                    <tr>
                        <td>{{ $language->name }}</td>
                        <td>
                            <div style="height: 20px; width: 150px; margin:0 auto; background-color: {{ $language->color }}"></div>
                        </td>
                        <td>
                            <a href="/admin/editlanguage/{{ $language->id }}" class="btn btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="/admin/addlanguage" class="btn btn-success">学習言語追加</a>
        </form>
    </div>
@endsection
