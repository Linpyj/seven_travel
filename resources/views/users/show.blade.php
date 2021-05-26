@extends('layouts.app')

@section('content')
<h1>会員詳細ページ</h1>

<div class="old-form">
<dl>
    <dt>ID</dt>
    <dd>{{ $user->id }}</dd>
    
    <dt>ユーザ名</dt>
    <dd>{{ $user->name }}</dd>

    <dt>メールアドレス</dt>
    <dd>{{ $user->email }}</dd>

    <dt>生年月日</dt>
    <dd>{{ $user->birthday }}</dd>

    <dt>電話番号</dt>
    <dd>{{ $user->tel }}</dd>
</dl>
</div>

<br>
<section>
       <a href="{{ route('users.index') }}" class="btn_1"><span>戻る</span></a>
</section>




@endsection