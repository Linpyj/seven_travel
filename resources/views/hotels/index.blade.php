@extends('layouts.app')

@section('content')
    @if(!!(Auth::user()->is_admin))
        <h1>ホテル一覧</h1>
        <form action="{{route('hotels.index')}}" method="get">
            @csrf
            @include('hotels.search')
            <section>
                <button type="submit" class="btn_2"><span>検索</span></button>
            </section>
        </form> 
        
        
        @if (count($hotels) == 0)
                <p>該当項目なし</p>
        @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ホテル名</th>
                            <th>都道府県</th>
                            <th>住所</th>
                            <th>電話番号</th>
                            <th>備考</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($hotels as $hotel)
                            <tr>
                                <td><a href="{{ route('hotels.show', $hotel->id) }}"
                                       style="text-decoration: none;">
                                    {{ $hotel->id }}</a></td>
                                <td><a href="{{ route('hotels.show', $hotel->id) }}">{{ $hotel->name }}</a></td>
                                <td>{{ $hotel->prefecture }}</td>
                                <td>{{ $hotel->address }}</td>
                                <td>{{ $hotel->tel }}</td>
                                <td>{{ $hotel->remarks }}</td>
                            </tr>
                        @endforeach            
                    </tbody>
                </table>
        
        @endif

    @elseif(!!(Auth::user()))

    <img src="/site-top.png"  class="site_image"></a>
        <!--<div class="top">
            <h1 class="title">SEVEN TRAVEL</h1>
            <p class="copy">行きたい、がきっと見つかる。</p>
            <p>This is sample texts.This is sample texts.This is sample texts.This is sample texts.</p>
        </div>-->
        <br>
        <p class="subtitle">SEVEN TRAVELおすすめのホテル</p>
        <p id="catch">SEVEN TRAVEL厳選！各シーズンおすすめホテル</p>
        <a href="{{ route('hotels.show', 2) }}"><img src="/sample1.jpg" alt="spring_hotel" class="top_image"></a>
        <a href="{{ route('hotels.show', 5) }}"><img src="/sample1.jpg" alt="fall_hotel" class="top_image"></a>
        <a href="{{ route('hotels.show', 8) }}"><img src="/sample1.jpg" alt="winter_hotel" class="top_image"></a>

        <p>春におすすめのホテル</p>
        <p>夏におすすめのホテル</p>
        <p>冬におすすめのホテル</p>
    @endif
@endsection