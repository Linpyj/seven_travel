@extends('layouts.app')

@section('content')
<h1>会員一覧</h1>
<form action="{{route('home')}}" method="get">
@csrf
@include('admin.search')
<button type="submit">検索</button>
</form>
@foreach($users as $user)
<!-- 検索結果を連想配列として一つずつ取り出して表示 -->
    <tr>
        <td><a href="{{ route('admin.users', $user->id) }}">{{ $user->id }}</a></td>
    </tr>
@endforeach
{{ $products->appends(Request::all())->links() }}
@endsection