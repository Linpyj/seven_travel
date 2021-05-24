@extends('layouts.app')

@section('content')

<h1>過去の予約</h1>
@foreach ($reservations as $reservation)
    <h2>{{ $reservation->plan->hotel->name }}：{{ $reservation->plan->name }}</h2>
    <p>チェックイン日{{ $reservation->check_in }}チェックアウト日{{ $reservation->check_out }}</p>
    <form action="{{ route('reviews.create') }}" method="get">
        @csrf
        <input type="hidden" name="hotel_id" value="{{ $reservation->plan->hotel_id }}">
        <button type="submit">口コミを投稿する</button>
    </form>
    {{-- <a href="{{ route('reviews.create', $reservation) }}">口コミを投稿する</a> --}}
    <a href="{{ route('plans.show', $reservation) }}">再予約する</a>
@endforeach

<section>
    <a href="{{ route('users.index') }}" class="btn_1"><span>戻る</span></a>
</section>
@endsection