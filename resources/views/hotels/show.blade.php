@extends('layouts.app')

@section('content')

<h1>ホテル情報</h1>

<dl>
    <dd id="hotel_name">{{ $hotel->name }}</dd>
</dl>

@if ($hotel->image == '')
    <p><img src="{{ asset('/storage/'.'defaultImage.png') }}" alt="default" class="hotel_image"></p>
@else
    <p><img src="{{ asset('/storage/'.$hotel->image) }}" alt="{{ $hotel->id }}" class="hotel_image"></p>
@endif

<div class="six-form">
<dl>
    <dt>見どころ</dt>
    <dd>{{ $hotel->remarks }}</dd>
    
    <br>
    <dt>カテゴリ</dt>
    <dd>{{ $hotel->category->name }}</dd>
    
    <br>
    <dt>プラン</dt><br>
    @foreach($plans as $plan)
        <tr>   
            <td><a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a></td>
            <td>価格：{{ $plan->price }} 円</td><br><hr>
        </tr>
    @endforeach
    
    <br>
    <dt>住所</dt>
    <dd>{{ $hotel->address }}</dd>
    
    <br>
    <dt>電話番号</dt>
    <dd>{{ $hotel->tel }}</dd>
   
    <br>
    <dt>　チェックイン時間-チェックアウト時間<dt>
    <dd> {{ $hotel->check_in }}-{{ $hotel->check_out }}</dd>

    
    <br>
    <dt>口コミ</dt>
    @if (count($reviews) == 0)
        <tr>
            <td>このホテルの口コミはありません</td>
        </tr>
    @else
        @foreach($reviews as $review)       
        <tr>

            <td>{{ $review->title }}</td>：
            <td>{!! nl2br(e($review->content)) !!}</td>
            <td>{{ $review->created_at }}</td><br><hr>
        </tr>
        @endforeach
    @endif

    

</dl>
</div>

<p>
    @if(Auth::user()->is_admin)
    <h2>管理者メニュー</h2>
        <section>
            <a href="{{ route('plans.create', ['hotel' => $hotel->id]) }}" class="btn_3"><span>プランの追加</span></a>
        </section>
        <section>
            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn_1"><span>ホテル情報編集</span></a>
        </section>

        <section>
            <a href="{{ route('hotels.destroy', $hotel->id) }}" onclick="deleteHotel()" class="btn_4"><span>ホテルの削除</span></a>
        </section>

            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" id="delete-form">
                @csrf
                @method('delete')
            </form>
            
            <script type="text/javascript">
                function deleteHotel(){
                    event.preventDefault();
                    if(window.confirm('本当に削除しますか？')){
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>    
    @endif
</p>


@endsection