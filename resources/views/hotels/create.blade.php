@extends('layouts.app')

@section('content')
    <h1>ホテル追加</h1>
    @include('commons/flash')
    <form action="{{ route('hotels.store') }}" method="post" id="create-form" enctype="multipart/form-data">
        @csrf
        
        <div class="hotel-form">
        <p>
            <label>名前<br>
                <input type="text" name="name" placeholder="必須" value="{{ old('name') }}"></label>
        </p>
        <p>
            <label>カテゴリ<br>
                <input type="text" name="category_id" placeholder="必須" value="{{ old('category_id') }}"></label>
        </p>
        <p>
            <label>住所<br>
                <input type="text" name="address" placeholder="例：東京都豊島区池袋1-1-1" value="{{ old('address') }}"></label>
        </p>
        <p>
            <label>電話番号<br>
                <input type="tel" name="tel" placeholder="例：08012345678" value="{{ old('tel') }}"></label>
        </p>
        
        <p>
            <label>チェックイン<br>
                <input type="time" name="check_in" value="{{ old('check_in') }}"></label>
        </p>
        <p>
            <label>チェックアウト<br>
                <input type="time" name="check_out" value="{{ old('check_out') }}"></label>
        </p>
        <p>
            <label>備考<br>
                <input type="text" name="remarks" placeholder="任意" value="{{ old('remarks') }}"></label>
        </p>
       <p>
            <label>県<br>
              <select name="prefecture" type="text" class="form-control">
                <option value="{{ request('prefecture') }}" disabled selected style='display:none;'>都道府県</option>
                <?php
                foreach ( $prefectures as $prefecture ) {
                    echo '<option value="', $prefecture, '">', $prefecture, '</option>';
                }
                ?>
            </select>
            </label>
        </p>
        <p>
            <label>画像<br>
                <input type="file" name="image" value="{{ old('image') }}"></label>
        </p>
        </div>

        <br>
        <section>
            <button type="submit" onclick="createHotel()" class="btn_2"><span>追加する</span></button>
        </section>
    </form>

    <script type="text/javascript">
        function createHotel() {
            event.preventDefault();
            if (window.confirm('本当に追加しますか？')) {
                document.getElementById('create-form').submit();
            }
        }
    </script>
@endsection
