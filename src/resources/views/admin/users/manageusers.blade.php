@extends('layouts.app')

@section('content')
    <div class="admin_container">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">ユーザー管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/managecontent">学習コンテンツ管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/managelanguages">学習言語管理</a>
                </li>
            </ul>
        </nav>
        <form action="" method="POST">
            @csrf
            <table>
                <tr>
                    <th>ユーザー名</th>
                    <th>メール</th>
                    <th>ロール</th>
                    <th>操作</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                            <a href="/admin/edituser/{{ $user->id }}" class="btn btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="/admin/adduser" class="btn btn-success">ユーザー追加</a>
        </form>
    </div>
@endsection
