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
    
        <p><button type=“button”><a href="{{ route('home') }}">プランの追加</button></p>

        <p><button type=“button”><a href="{{ route('home') }}">ホテル情報編集</button></p>

        <p><button type=“button”><a href="{{ route('home') }}">ホテルの削除</button></p>
    @endif
</p>

@endsection