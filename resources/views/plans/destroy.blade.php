@extends('layouts.app')

@section('content')
<h1>プラン削除管理</h1>

<p>このプラン情報を本当に削除しますか？</p>

    <p>
        <button type=“button”><a href="{{ route('hotels.show') }}">削除する</a></button>
    </p>
    <p>
        <button type=“button”><a href="{{ route('hotels.show') }}">戻る</a></button>
    </p>
@endsection

<

