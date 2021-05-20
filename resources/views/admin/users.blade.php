@extends('layouts.app')

@section('content')
<h1>会員一覧</h1>
<form action="{{route('')}}" method="post">
@csrf
<p>
<label>絞り込み<br>
<input type="text" name="text"
       value="{{old('text')}}"></label>
</p>
<p><button type="submit">検索</button></p>
</form>
@endsection