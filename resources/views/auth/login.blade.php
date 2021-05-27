@extends('layouts.app')

@section('content')
<h1>ログイン</h1>

@include('commons/flash')
<form action="{{route('login')}}" method="post">
    @csrf

    <div class="first-form">
    <p>
    <label>メールアドレス<br>
    <input type="email" name="email"
           value="{{old('email')}}"></label>
    </p>
    <p>
    <label>パスワード<br>
    <input type="password" name="password"
           value=""></label>
    </p>
    <section>
        <button type="submit" class="btn_2"><span>ログイン</span></button>
    </section>
    </div>

    <p id="register-script">会員登録がおすみでない方はこちら</p>

    <section>
        <a href="{{ route('register') }}" class="btn_1"><span>新規登録</span></a>
    </section>
</form>
@endsection