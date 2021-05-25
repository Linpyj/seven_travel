@extends('layouts.app')

@section('content')
<h1>会員情報編集</h1>

<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="second-form">
              <p>
                     <label>名前<br>
                     <input type="text" name="name" value="{{old('name')}}"></label>
              </p>
              <p>
                     <label>住所<br>
                     <input type="text" name="address" value="{{old('address')}}"></label>
              </p>
              <p>
                     <label>電話番号<br>
                     <input type="tel" name="tel" value="{{old('tel')}}"></label>
              </p>
              <p>
                     <label>メールアドレス<br>
                     <input type="email" name="email" value="{{old('email')}}"></label>
              </p>
              <p>
                     <label>生年月日<br>
                     <input type="date" name="birthday" value="{{old('birthday')}}"></label>
              </p>
              <p>
                     <label>パスワード<br>
                     <input type="password" name="password" value=""></label>
              </p>
              <p>
                     <label>パスワード確認<br>
                     <input type="password" name="password_confirmation" value=""></label>
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