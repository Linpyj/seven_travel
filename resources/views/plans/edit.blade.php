@extends('layouts.app')

@section('content')

<h1>プラン情報編集</h1>
@include('commons/flash')
<form action="{{ route('plans.update', $plan->id) }}" method="POST">

    @method('put')
    @csrf

    <dl>
        <dt>プランの名前</dt>
        <dd>
            <input type="text" name="name" value="{{ old('name', $plan->name) }}">
        </dd>
        <dt>プランの価格</dt>
        <dd>
            <input type="number" name="price" value="{{ old('price', $plan->price)}}">
        </dd>
        <dt>プランの部屋数</dt>
        <dd>
            <input type="text" name="number_of_room" value="{{ old('number_of_room', $plan->number_of_room)}}">
        </dd>
        
        <dt>見どころ</dt>
        <dd>
            <textarea name="remark" row="5">{{ old('remark', $plan->remark)}}</textarea>
        </dd>

    </dl>
    
    <section>
        <button type="submit" class="btn_1"><span>変更</span></button>
    </section>
</form>

@endsection
