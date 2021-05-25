@extends('layouts.app')

@section('content')

<h1>プラン詳細</h1>
@if ($plan->hotel->image == '')
    <p><img src="{{ asset('/storage/'.'defaultImage.png') }}" alt="default"></p>
@else
    <p><img src="{{ asset('/storage/'.$plan->hotel->image) }}" alt="{{ $plan->hotel->id }}"></p>
@endif

<div class="old-form">
    <dl>
        <dt>プラン名</dt>
        <dd>{{ $plan->name }}</dd>
    
        <dt>ホテル</dt>
        <dd><a href="{{ route('hotels.show', $plan->hotel->id) }}">{{ $plan->hotel->name }}</a></dd>

        <dt>見どころ</dt>
        <dd>{{ $plan->remarks }}</dd>

        <dt>価格</dt>
        <dd>{{ $plan->price }}</dd>

        <dt>部屋数</dt>
        <dd>{{ $plan->number_of_room }}</dd>
    </dl>
</div>
{{-- @if(!(Auth::user()->is_admin)) --}}
    <form action="{{ route('reservations.create') }}" method="get">
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <button type="submit">予約フォームへ</button>
    </form>
{{-- @endif --}}


<p>
    @if(Auth::user()->is_admin)
    
       
        <section>
            <a href="{{ route('home') }}" class="btn_1"><span>プランの編集</span></a>
        </section>

        <section>
            <a href="{{ route('home') }}" class="btn_4"><span>プランの削除</span></a>
        </section>
    @endif
</p>

@endsection