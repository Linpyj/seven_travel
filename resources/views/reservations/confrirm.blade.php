@extends('layouts.app')

@section('content')

<h1>予約確認</h1>
<p>こちらの予約でお間違えないですか？</p>

<form action="{{ route('home') }}" method="GET">
    @csrf

    <div>
        <label>ホテル</label>
        <span>{{ $plan->hotel->name }}</span>
        <input type="text" name="hotel" value="{{'hotel'}}"  type="hidden">
    </div>
    <!--ホテルの項目いらない？-->
    
    <div>
        <label>プラン</label>
        <span>{{ $input_data->$plan->name }}</span>
        <input type="text" name="hotel" value="{{'plan'}}"  type="hidden">
    </div>

    <div>
        <label>お名前</label>
        <span>{{ $input_data->$user_name }}</span>
        <input type="text" name="user_name" value="{{'user_name'}}"  type="hidden">
    </div>

    <div>
        <label>チェックイン日</label>
        <span>{{ $input_data->$check_in }}</span>
        <input type="date" name="check_in" value="{{'check_in'}}" type="hidden">
    </div>

    <div>
        <label>チェックアウト日</label>
        <span>{{ $input_data->$check_out }}</span>
        <input type="date" name="check_out" value="{{'check_out'}}" type="hidden">
    </div>

    <button name="back" type="submit" value="true">戻る</button>
    <button name="register" type="submit" value="true">登録</button>

</form>
    
@endsection