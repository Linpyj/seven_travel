@extends('layouts.app')

@section('content')
<h1>口コミ投稿</h1>

     <form action="{{ route('reviews.store') }}" method="POST" id="create-form">
        @csrf
        <dl>
        <dt>タイトル</dt>
        <dd>
            <input type="text" name="title" value="{{ old('title', $review->title) }}">
        </dd>
        <dt>口コミ内容</dt>
        <dd>
            <input type="text" name="content" value="{{ old('content', $review->content) }}">
        </dd>
        <dd>
            <input type="hidden" name="hotel_id" value="{{ old('hotel_id', $hotel_id) }}">
        </dd>
        </dl>
        <button type="submit" onclick="createReview()">投稿</button>
    </form>
    <a href="{{ route('reservations.index') }}">戻る</a>

    <script type="text/javascript">
        function createReview() {
        event.preventDefault();
        if(window.confirm('この内容で間違いないですか？')) {
            document.getElementById('create-form').submit();
        }
        }
    </script>
@endsection