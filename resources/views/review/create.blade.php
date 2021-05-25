@extends('layouts.app')

@section('content')
<h1>口コミ投稿</h1>

     <form action="{{ route('reviews.store') }}" method="POST" id="create-form">
        @csrf
        <div class="review-form">
            <dl>
                <dt>タイトル</dt>
                <dd>
                    <input type="text" name="title" placeholder="必須" value="{{ old('title') }}">
                </dd>
                
                <dl>
                <dt>口コミ内容</dt>
                <dd>
                    <input type="text" name="content" placeholder="300文字以内" value="{{ old('content') }}">
                </dd>
                <dd>
                <input type="hidden" name="hotel_id" value="{{ old('hotel_id') }}">
                </dd>
            </dl>
        </div>

        <br>
        <section>
            <button type="submit" onclick="createReview()" class="btn_2"><span>投稿</span></button>
        </section>
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