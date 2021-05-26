@extends('layouts.app')

@section('content')
@include('commons/flash')
<h1>会員情報編集</h1>

<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="second-form">
              <p>
                     <label>名前<br>
                     <input type="text" name="name" placeholder="必須" value="{{old('name')}}"></label>
              </p>
              <p>
                     <label>住所<br>
                     <input type="text" name="address" placeholder="例：東京都豊島区1-1-1" value="{{old('address')}}"></label>
              </p>
              <p>
                     <label>電話番号<br>
                     <input type="tel" name="tel" placeholder="例：08012345678" value="{{old('tel')}}"></label>
              </p>
              <p>
                     <label>メールアドレス<br>
                     <input type="email" name="email" placeholder="必須" value="{{old('email')}}"></label>
              </p>
              <p>
                     <label>生年月日<br>
                     <input type="date" name="birthday" value="{{old('birthday')}}"></label>
              </p>
              <p>
                     <label>パスワード<br>
                     <input type="password" name="password" placeholder="8文字以上" value=""></label>
              </p>
              <p>
                     <label>パスワード確認<br>
                     <input type="password" name="password_confirmation" placeholder="上記のパスワードを入力" value=""></label>
              </p>
       </div>
       <br>
       <section>
           <button type="submit" class="btn_2"><span>変更する</span></button>
       </section>
</form>
<br>
<section>
       <a href="{{ route('users.show',\Auth::id()) }}" class="btn_1"><span>戻る</span></a>
</section>
    
@endsection