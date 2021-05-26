@extends('layouts.app')

@section('content')
    <h1>予約受付</h1>
    @include('commons/flash')
<div class="fifth-form">
    <dt>プラン</dt>
    <dd>{{ $plan->name }}</dd>

    <dt>ホテル</dt>
    <dd><a href="{{ route('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></dd>
</div>
    <p class="script">上記のホテルとプラン名で予約します。</p>
    <p class="script">チェックイン日、チェックアウト日を入力してください。</p>

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

    <section>
        <button type="submit" class="btn_2"><span>確認</span></button>
    </section>
    
    </form>
</div>

@endsection
