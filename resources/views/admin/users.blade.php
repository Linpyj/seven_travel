@extends('layouts.app')

@section('content')
<h1>会員一覧</h1>
<form action="{{route('home')}}" method="post">
@csrf
<p>
<label>絞り込み<br>
<input type="text" name="text"
       value="{{old('text')}}"></label>
</p>
<p><button type="submit">検索</button></p>
</form>
@foreach($users as $user)
    <tr>
        <td>{{ users()->id }}</td>
    </tr>
@endforeach

    {{ $products->appends(Request::all())->links() }}

@endsection