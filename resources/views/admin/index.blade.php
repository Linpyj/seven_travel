@extends('layouts.app')

@section('content')
<h1>ホテル一覧</h1>
<a href="{{ route('home') }}">ホテルを追加する</a>
<a href="{{ route('home') }}">会員一覧</a>
<form action="{{route('home')}}" method="get">
@csrf
@include('hotels.search')
<button type="submit">検索</button>
</form>
@foreach($hotels as $hotel)
<!-- 検索結果を連想配列として一つずつ取り出して表示 -->
    <tr>
        <td><a href="{{ route('home') }}">ホテルを追加する</a></td>
        <td><a href="{{ route('home') }}">会員一覧</a></td>
    </tr>
@endforeach
{{ $products->appends(Request::all())->links() }}
@endsection