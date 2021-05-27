@extends('layouts.app')

@section('content')

@if ($flag == true)
    <h1>予約完了</h1>

    <br>
    <p class="script">予約が完了しました！</p>

    <br>
    <p class="script">予約の詳細・キャンセルはマイページで確認できます。</p>
    <p class="script">当日は気を付けてお越しください。</p>

    <section>
        <a href="{{ route('home') }}" class="btn_3"><span>ホームに戻る</span></a>
    </section>
@else
    <p class="script">申し訳ございません、満室です。別のホテルをご予約ください。</p>
    <section>
        <a href="{{ route('home') }}" class="btn_3"><span>ホームに戻る</span></a>
    </section>
@endif

@endsection