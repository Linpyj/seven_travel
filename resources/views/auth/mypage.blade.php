@extends('layouts.app')

@section('content')
<h1>マイページ</h1>
    <table>
        <tr>
            <td><a href="{{ route('home') }}">会員情報編集</a></td>
            <td><a href="{{ route('home') }}">過去の予約</a></td>
            <td><a href="{{ route('home') }}">ログアウト</a></td>
        </tr>
    </table>
<h2>会員詳細情報</h2>
    <table border="1">
        <tr>
            <th>名前</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>生年月日</th>
            <th>パスワード</th>
        </tr>
        <tr>
            <td>{{ Auth::user()->name }}</td>
            <td>{{ Auth::user()->address }}</td>
            <td>{{ Auth::user()->tel }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>{{ Auth::user()->birthday }}</td>
            <td>{{ Auth::user()->password }}</td>
        </tr>
    </table>
<h2>現在の予約一覧</h2>
    
    <a href="{{ route('home') }}">戻る</a>
    <a href="{{ route('home') }}">退会する</a>    
@endsection