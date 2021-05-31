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
                {{ $hotels->appends(Request::all())->links('vendor.pagination.sample-pagination') }}
        @endif

    @elseif(!!(Auth::user()))
    
    <div class="imgArea">
        <img src="/site-top.jpg"  class="site_image">
        <div class="over" id="makeImg">
            SEVEN TRAVEL　
            <p class="copy"> All journeys have secret destinations of which the traveler is unaware.</p>
        </div>
    </div>
         <!-- <p class="copy">行きたい、がきっと見つかる。</p>
            
        </div>-->
        <br>
        <p class="subtitle">SEVEN TRAVEL SELECTION</p>
        <br>
        <a href="{{ route('hotels.show', 2) }}"><img src="/sample2.jpeg" alt="spring_hotel" class="top_image"></a>
        <a href="{{ route('hotels.show', 5) }}"><img src="/sample1.jpg" alt="fall_hotel" class="top_image"></a>
        <a href="{{ route('hotels.show', 8) }}"><img src="/sample3.jpeg" alt="winter_hotel" class="top_image"></a>

        <div class="season">
            <p>春におすすめのホテル</p>
            <p>夏におすすめのホテル</p>
            <p>冬におすすめのホテル</p>
        </div>

        <br>
        <p class="subtitle">WHAT'S SEVEN  TRAVEL ?</p>
        <p class="script">SEVEN TRAVELはホテル予約サービスです。全国のホテルからあなたの条件にあうホテルを見つけ出します。</p>

        <div class="slide" id="makeImg">
            <img src="/sample4.jpg" alt="spring_hotel" >
            <img src="/sample5.jpg" alt="fall_hotel" >
            <img src="/sample6.jpg" alt="winter_hotel">
        </div>

        <p class="subtitle">HOW TO USE ?</p>
        <p class="script">利用方法はたったの3ステップ！</p>
        <br>
        <div class="box img1" >
            <span>1</span>
        </div>

        <div class="box img2">
            <span>2</span>
        </div>

        <div class="box img3" >
            <span>3</span>
        </div>
        
        
        <div class="step">
        
        
        <p>プラン検索から<br>希望条件に合うプランを選択!</p>
        <p>予約フォームから<br>訪問日を入力して予約！</p>
        <p>現地でお支払い！</p>
        </div>
        <br>
    @endif
@endsection