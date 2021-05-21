@extends('layouts.app')

@section('content')
<h1>会員登録</h1>

<form action="{{route('register')}}" method="post">

<div class="second-form">
    @csrf
    <p>
    <label>名前<br>
    <input type="text" name="name"
           value="{{old('name')}}"></label>
    </p>
    <p>
    <label>住所<br>
    <input type="text" name="address"
           value="{{old('address')}}"></label>
    </p>
    <p>
    <label>電話番号<br>
    <input type="tel" name="tel"
           value="{{old('tel')}}"></label>
    </p>
    <p>
    <label>メールアドレス<br>
    <input type="email" name="email"
           value="{{old('email')}}"></label>
    </p>
    <p>
    <label>生年月日<br>
    <input type="date" name="birthday"
           value="{{old('birthday')}}"></label>
    </p>
    <p>
    <label>パスワード<br>
    <input type="password" name="password"
           value=""></label>
    </p>
    <p>
    <label>パスワード確認<br>
    <input type="password" name="password_confirmation"
           value=""></label>
    </p>
    

   
</div>

<div class="button-container">
    <button type="submit" class="btn_2"><span>新規登録</span></button>
    
    <p id="login-script">会員登録済みの方はこちら</p><br>

    <div>
       <a href="{{ route('login') }}" class="btn_1"><span>ログイン</span></a>
    </div>

</div>

</form>

@endsection