@extends('layouts.app')

@section('content')

<h1>ホテル情報</h1>

<p><img src="{{ $hotel->image }}" alt="{{ $hotel->id }}"></p>

<dl>
    <dt>ホテル名</dt>
    <dd>{{ $hotel->name }}</dd>
    
    <dt>カテゴリ</dt>
    <dd>{{ $hotel->category->name }}</dd>

    <dt>見どころ</dt>
    <dd>{{ $hotel->remarks }}</dd>

    <th>プラン</th>
    @foreach($hotels as $hotel)
        <tr>   
            <td><a href="{{ route('plans.show', $hotel->plan->id) }}">{{ $hotel->plan->name }}</a></td>
        </tr>
    @endforeach

    <dt>住所</dt>
    <dd>{{ $hotel->address }}</dd>

    <dt>電話番号</dt>
    <dd>{{ $hotel->tel }}</dd>

    <dt>チェックイン時間</dt>
    <dd>{{ $hotel->check_in }}</dd>

    <dt>チェックアウト時間</dt>
    <dd>{{ $hotel->check_out }}</dd>
    
    <th>口コミ</th>

    @foreach($hotels as $hotel)       
                <tr>
                    <td>{{ $hotel->review->title }}</td>
                    <td>{{ $hotel->review->created_at }}</td>
                    <td>{!! nl2br(e($hotel->review->content)) !!}</td>
                </tr>
    @endforeach

</dl>

<p>
    @if(Auth::user()->is_admin)
    
        <section>
            <a href="{{ route('home') }}" class="btn_3"><span>プランの追加</span></a>
        </section>
        <section>
            <a href="{{ route('home') }}" class="btn_1"><span>ホテル情報編集</span></a>
        </section>

        <section>
            <a href="{{ route('hotels.destroy', \Auth::id()) }}" onclick="deleteHotel()" class="btn_4"><span>ホテルの削除</span></a>
        </section>

            <form action="{{ route('hotels.destroy', \Auth::id()) }}" method="POST" id="delete-form">
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