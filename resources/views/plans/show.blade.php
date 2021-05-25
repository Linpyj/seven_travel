@extends('layouts.app')

@section('content')

<h1>プラン詳細</h1>
@if ($plan->hotel->image == '')
    <p><img src="{{ asset('/storage/'.'defaultImage.png') }}" alt="default"></p>
@else
    <p><img src="{{ asset('/storage/'.$plan->hotel->image) }}" alt="{{ $plan->hotel->id }}"></p>
@endif
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

<p><button type=“button”><a href="{{ route('reservations.create') }}"> 予約フォームへ</button></p>

<p>
    @if(Auth::user()->is_admin)
    
        <p><button type=“button”><a href="{{ route('home') }}">プラン情報編集</button></p>

        <p><button type=“button”><a href="{{ route('home') }}">プランの削除</button></p>
    @endif
</p>

@endsection