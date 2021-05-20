@extends('layouts.app')

@section('content')

<h1>プラン詳細</h1>

<p><img src="{{ $plan->hotel->image }}" alt="{{ $plan->hotel->id }}"></p>

<dl>
    <dt>プラン名</dt>
    <dd>{{ $plan->name }}</dd>
    
    <dt>ホテル</dt>
    <dd><a href="{{ route('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></dd>

    <dt>見どころ</dt>
    <dd>{{ $plan->remarks }}</dd>

    <dt>価格</dt>
    <dd>{{ $plan->price }}</dd>

    <dt>部屋数</dt>
    <dd>{{ $plan->number_of_room }}</dd>

</dl>

<p>このプランで予約しますか？</p>

<p><button type=“button”><a href="{{ route('home') }}"> 予約フォームへ</button></p>

<p>
    @if(Auth::user()->is_admin)
    
        <p><button type=“button”><a href="{{ route('home') }}">プラン情報編集</button></p>

        <p><button type=“button”><a href="{{ route('home') }}">プランの削除</button></p>
    @endif
</p>

@endsection