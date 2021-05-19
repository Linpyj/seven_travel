@extends()

@section()
<h1>ログイン</h1>
@include()
<form action="{{route('')}}" method="post">
    @csrf
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
    <p>
        <button type="submit">ログイン</button>
    </p>
    <p>または</p>
    <p>
        <button type="submit">新規会員登録</button>
    </p>
</form>
@endsection