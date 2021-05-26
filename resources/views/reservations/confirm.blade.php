@extends('layouts.app')

@section('content')

<h1>予約確認</h1>
<p>こちらの予約でお間違えないですか？</p>

<div>
    <label>ホテル</label>
    <p>{{ $plan->hotel->name }}</p>
</div>
<form action="{{ route('reservations.store') }}" method="post">
    @csrf
    <div>
        <label>プラン</label>
        <p>{{ $plan->name }}</p>
    </div>
    <div>
        <label>チェックイン日</label>
        <p>{{ $input_data['check_in'] }}</p>
        <input name="check_in" value="{{ $input_data['check_in'] }}" type="hidden">
    </div>

    <div>
        <label>チェックアウト日</label>
        <p>{{ $input_data['check_out'] }}</p>
        <input name="check_out" value="{{ $input_data['check_out'] }}" type="hidden">
    </div>
    <div>
        <input type="hidden" name="number_of_room" value="{{ $plan->number_of_room }}">
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
    </div>

    <button name="back" type="submit" value="true">戻る</button>
    <button name="reservation_store" type="submit" value="true">登録</button>

</form>
    
@endsection