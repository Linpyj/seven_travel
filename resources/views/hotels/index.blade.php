@extends('layouts.app')
@section('content')
@if(Auth::user()->is_admin)
    <h1>ホテル一覧</h1>
    <form action="{{route('hotels.index')}}" method="get">
    @csrf
    @include('hotels.search')
    <section>
        <button type="submit" class="btn_2"><span>検索</span></button>
    </section>
    </form>
    @foreach($hotels as $hotel)
    
    @endforeach
    
@elseif(Auth::user())
    <div class="top">
        <h1 class="title">SEVEN TRAVEL</h1>
        <p class="copy">行きたい、がきっと見つかる。</p>
        <p>This is sample texts.This is sample texts.This is sample texts.This is sample texts.</p>
    </div>
    <p class="subtitle">SEVEN TRAVELおすすめのホテル</p>
    <p id="catch">SEVEN TRAVEL厳選！各シーズンおすすめホテル</p>
    <a href="/"><img src="/sample1.jpg" alt="spring_hotel" class="top_image"></a>
    <a href="/"><img src="/sample1.jpg" alt="fall_hotel" class="top_image"></a>
    <a href="/"><img src="/sample1.jpg" alt="winter_hotel" class="top_image"></a>
@endif
@endsection