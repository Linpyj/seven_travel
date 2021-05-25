@extends('layouts.app')

@section('content')
    @if(!!(Auth::user()->is_admin))
        <h1>ホテル一覧</h1>
        <form action="{{route('hotels.index')}}" method="get">
            @csrf
            @include('hotels.search')
            <button type="submit">検索</button>
        </form>
        
        
        @if (count($hotels) == 0)
            @if (count($error) == 0)
                <p>該当項目なし</p>
            @endif
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
                                       style="text-decoration: none;"
                                >
                                    {{ $hotel->id }}</a></td>
                                <td>{{ $hotel->name }}</td>
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