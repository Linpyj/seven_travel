@extends('layouts.app')

@section('content')
    <h1>予約受付</h1>
    @include('commons/flash')

    <h2>ホテル：<a href="{{ route('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></h2>
    <h2>プラン：{{ $plan->name }}</h2>

    <p class="script">上記のホテルとプラン名で予約します。以下の項目を入力してください。</p>


<div class="review-form">
    <form action="{{ route('confirm') }}" method="post">
        @csrf
        <div>
            <label>チェックイン日</label>
            <input type="date" name="check_in" value="{{ old('check_in') }}" placeholder="チェックイン日は入力必須です。">
        </div>

        <div>
            <label>チェックアウト日</label>
            <input type="date" name="check_out" value="{{ old('check_out') }}" placeholder="チェックアウト日は入力必須です。"></label>
        </div>
        <div>
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        </div>
        <div>
            <input type="hidden" name="number_of_room" value="{{ $plan->number_of_room }}">
        </div>
<br>
    <section>
        <button type="submit" class="btn_2"><span>確認</span></button>
    </section>
    
    </form>
</div>

@endsection
