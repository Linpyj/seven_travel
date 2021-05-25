@extends('layouts.app')

@section('content')
    <h1>予約受付</h1>

    <dt>プラン</dt>
    <dd>{{ $plan->name }}</dd>

    <dt>ホテル</dt>
    <dd><a href="{{ route('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></dd>

    <p>上記のホテルとプラン名で予約します。</p>
    <p>氏名とチェックイン日、チェックアウト日を入力してください。</p>

    <form action="{{ route('confirm') }}" method="post">
        @csrf
        <div>
            <label>チェックイン日</label>
            <input type="date" name="check_in" value="{{ old('check_in') }}">
        </div>

        <div>
            <label>チェックアウト日</label>
            <input type="date" name="check_out" value="{{ old('check_out') }}"></label>
        </div>
        <div>
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        </div>
        <div>
            <input type="hidden" name="number_of_room" value="{{ $plan->number_of_room }}">
        </div>

        <button type="submit">確認</button>

    </form>

@endsection
