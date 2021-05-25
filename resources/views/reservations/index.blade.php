@extends('layouts.app')

@section('content')

<h1>過去の予約</h1>

<div class="old-form">
@foreach ($reservations as $reservation)
    <h2>{{ $reservation->plan->hotel->name }}：{{ $reservation->plan->name }}</h2>
    <p class="script">チェックイン日{{ $reservation->check_in }}　チェックアウト日{{ $reservation->check_out }}</p>
    <form action="{{ route('reviews.create') }}" method="get">
        @csrf
        <input type="hidden" name="hotel_id" value="{{ $reservation->plan->hotel_id }}">
        <section>
            <button type="submit" class="btn_2"><span>口コミを投稿する</span></button>
        </section>
    </form>
    {{-- <a href="{{ route('reviews.create', $reservation) }}">口コミを投稿する</a> --}}

    <section>
        <a href="{{ route('plans.show', $reservation) }}" class="btn_1"><span>再予約する</span></a>
    </section>
@endforeach
</div>

<br>
<section>
    <a href="{{ route('users.index') }}" class="btn_1"><span>前の画面に戻る</span></a>
</section>
@endsection