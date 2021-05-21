@extends('layouts.app')

@section('content')
<h1>ホテル一覧</h1>
<form action="{{route('login')}}" method="post">
@csrf
<p>
<label>絞り込み<br>
<input type="text" name="text"
       value="{{old('text')}}"></label>
</p>
<p><button type="submit">検索</button></p>
</form>
<table>
    <tr>
        <td><a href="{{ route('home') }}">ホテルを追加する</a></td>
        <td><a href="{{ route('home') }}">会員一覧</a></td>
    </tr>
</table>    
@endsection