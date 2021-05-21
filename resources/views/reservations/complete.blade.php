@extends('layouts.app')

@section('content')

<h1>予約完了</h1>
<p>予約が完了しました！</p>
<p>予約の詳細・キャンセルはマイページで確認できます。</p>
<p>当日は気を付けてお越しください。</p>

<p><button type=“button”><a href="{{ route('home') }}">ホームに戻る</button></p>
    
@endsection