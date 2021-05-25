@extends('layouts.app')

@section('content')
<h1>会員詳細ページ</h1>

@foreach($user as $item)
<dl>
    <dt>ID</dt>
    <dd>{{ $item->id }}</dd>
    
    <dt>ユーザ名</dt>
    <dd>{{ $item->name }}</dd>

    <dt>メールアドレス</dt>
    <dd>{{ $item->email }}</dd>

    <dt>生年月日</dt>
    <dd>{{ $item->birthday }}</dd>

    <dt>電話番号</dt>
    <dd>{{ $item->tel }}</dd>
</dl>



@endforeach

@endsection