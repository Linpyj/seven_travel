@extends('layouts.app')

@section('content')
<h1>会員登録</h1>
@include('commons/flash')
<form action="{{route('register')}}" method="post">

<div class="second-form">
    @csrf
    <p>
    <label>名前<br>
    <input type="text" name="name" placeholder="必須"
           value="{{old('name')}}"></label>
    </p>
    <p>
    <label>住所<br>
    <input type="text" name="address" placeholder="例：東京都豊島区池袋1-1-1"
           value="{{old('address')}}"></label>
    </p>
    <p>
    <label>電話番号<br>
    <input type="tel" name="tel" placeholder="例：08012345678"
           value="{{old('tel')}}"></label>
    </p>
    <p>
    <label>メールアドレス<br>
    <input type="email" name="email" placeholder="必須"
           value="{{old('email')}}"></label>
    </p>
    <p>
    <label>生年月日<br>
    <input type="date" name="birthday"
           value="{{old('birthday')}}"></label>
    </p>
    <p>
    <label>パスワード<br>
    <input type="password" name="password" placeholder="8文字以上"
           value=""></label>
    </p>
    <p>
    <label>パスワード確認<br>
    <input type="password" name="password_confirmation" placeholder="上記のパスワードを入力"
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