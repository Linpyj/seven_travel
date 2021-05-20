@extends('layouts.app')

@section('content')
<h1>ホテル編集</h1>

<form action="{{route('register')}}" method="post">
    @csrf
    <p>
    <label>名前<br>
    <input type="text" name="name"
           value="{{old('name')}}"></label>
    </p>
    <p>
    <label>カテゴリ<br>
    <input type="text" name="category_id"
           value="{{old('category_id')}}"></label>
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
    <label>画像<br>
    <input type="text" name="image"
           value="{{old('image')}}"></label>
    </p>
    <p>
    <label>チェックイン<br>
    <input type="date" name="check_in"
           value="{{old('check_in')}}"></label>
    </p>
    <p>
    <label>チェックアウト<br>
    <input type="date" name="check_out"
           value="{{old('check_out')}}"></label>
    </p>
    <p>
    <label>備考<br>
    <input type="text" name="remarks"
           value="{{old('remarks')}}"></label>
    </p>
    <p>
    <label>県<br>
    <input type="text" name="prefecture"
           value="{{old('prefecture')}}"></label>
    </p>
    <p>
           <button type="submit">変更する</button>
    </p>
</form>
@endsection