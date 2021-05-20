@extends('layouts.app')

@section('content')

<h1>過去の予約</h1>
@foreach ($reservations as $reservation)
    <h2>{{ $reservation->plan->hotel->name }}：{{ $reservaion->plan->name }}</h2>
    <p>チェックイン時間{{ $reservation->plan->hotel->check_in }}チェックアウト時間{{ $reservation->plan->hotel->check_out }}</p>
    <a href="{{ route('review.create') }}">口コミを投稿する</a>
    <a href="{{ route('plan.show') }}">再予約する</a>
@endforeach
<a href="{{ route('user.index') }}">戻る</a>