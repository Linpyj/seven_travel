@extends('layouts.app')

@section('content')

<h1>予約確認</h1>
<p class="script">こちらの予約でお間違えないですか？</p>


<form action="{{ route('reservations.store') }}" method="post">
    @csrf
<div class="first-form">
    <div>
        <label>ホテル</label>
        <p>{{ $plan->hotel->name }}</p>
    </div>
    <div>
        <label>プラン</label>
        <p>{{ $plan->name }}</p>
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
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
        <input name="number_of_room" value="{{ $plan->number_of_room }}"  type="hidden">
    </div>
</div>

<br>
<section>
    <button name="back" type="submit" value="true" class="btn_2"><span>戻る</span></button>
</section>

    <section>
        <button name="reservation_store" type="submit" value="true" class="btn_2"><span>登録</span></button>
    </section>

</form>
    
@endsection