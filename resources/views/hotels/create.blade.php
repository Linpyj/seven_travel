@extends('layouts.app')

@section('content')
    <h1>ホテル追加</h1>
    @include('commons/flash')
    <form action="{{ route('hotels.store') }}" method="post" id="create-form" enctype="multipart/form-data">
        @csrf
        
        <div class="hotel-form">
        <div class="flex">
            <label>名前<br>
                <input type="text" name="name" placeholder="必須" value="{{ old('name') }}"></label>

            <label>　カテゴリ<br>
               　 <input type="text" name="category_id" placeholder="必須" value="{{ old('category_id') }}"></label>
        </div>

        <p>
            <label>県<br>
                <div class="cp_select cp_sl04">
                    <select name="prefecture" type="text" class="form-control">
                        @foreach ($prefectures as $prefecture)
                            <option value="{{ $prefecture }}" {{ request('prefecture') == $prefecture ? 'selected' : '' }}>{{ $prefecture }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
        </p>
        <div class="flex">
        <p>
            <label>住所<br>
                <input type="text" name="address" placeholder="例：東京都豊島区池袋1-1-1" value="{{ old('address') }}"></label>
        </p>
        <p>
           　 <label>電話番号<br>
              　  <input type="tel" name="tel" placeholder="例：08012345678" value="{{ old('tel') }}"></label>
        </p>
        </div>
        
        <div class="flex">
            <label>チェックイン<br>
                <input type="time" name="check_in" value="{{ old('check_in') }}"></label>

           　 <label>チェックアウト<br>
            <input type="time" name="check_out" value="{{ old('check_out') }}"></label>
        </div>
        
        <p>
            <label>備考<br>
             <textarea type="text" name="remarks" placeholder="任意" value="{{ old('remarks') }}" rows="3" class="hotel-create">
             </textarea></label>
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
