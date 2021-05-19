@extends('layouts.app')

@section('content')
<h1>予約受付</h1>

    <dt>プラン</dt>
    <dd>{{ $plan->name }}</dd>
    
    <dt>ホテル</dt>
    <dd><a href="{{ route ('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></dd>

<p>上記のホテルとプラン名で予約します。</p>
<p>氏名とチェックイン日、チェックアウト日を入力してください。</p>

<form action="{{route('')}}" method="post">
    @include('reservations/form')
           <button type="submit">確認</button>
</form>
    
@endsection