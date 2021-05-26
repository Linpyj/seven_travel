@extends('layouts.app')

@section('content')
<h1>ホテル編集</h1>

<div class="old-form">
<form action="{{ route('hotels.update', $hotel->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <p>
    <label>名前<br>
    <input type="text" name="name" placeholder="必須"
           value="{{ old('name', $hotel->name)}}"></label>
    </p>
    <p>
    <label>カテゴリ<br>
    <input type="text" name="category_id" placeholder="必須"
           value="{{old('category_id', $hotel->category_id)}}"></label>
    </p>

    <p>
    <label>県<br>

       <div class="cp_select cp_sl04 ">
              {{-- <select type="text" class="form-control" name="prefecture">                          
              @foreach((array)config('pref') as $key => $score)
                      <option value="{{ $score }}">{{ $score }}</option>
              @endforeach
              </select> --}}
              <select name="prefecture" type="text" class="form-control">
                     <option value="{{ request('prefecture') }}" disabled selected style='display:none;'>都道府県</option>
                     <?php
                     foreach ( $prefectures as $prefecture ) {
                         echo '<option value="', $prefecture, '">', $prefecture, '</option>';
                     }
                     ?>
              </select>
        </div>
    </label>
    </p>

    <p>
    <label>住所<br>
    <input type="text" name="address" placeholder="例：東京都豊島区池袋1-1-1"
           value="{{ old('address', $hotel->address)}}"></label>
    </p>
    <p>
    <label>電話番号<br>
    <input type="tel" name="tel" placeholder="例：08012345678"
           value="{{ old('tel', $hotel->tel)}}"></label>
    </p>
    <p>
    <label>画像<br>
       <input type="file" name="image" value="{{ old('image', $hotel->image) }}"></label></label>
    </p>
    <p>
    <label>チェックイン<br>
    <input type="time" name="check_in"
           value="{{ old('check_in', $hotel->check_in)}}"></label>
    </p>
    <p>
    <label>チェックアウト<br>
    <input type="time" name="check_out"
           value="{{ old('check_out', $hotel->check_out)}}"></label>
    </p>
    <p>
    <label>備考<br>
    <input type="text" name="remarks" placeholder="任意"
           value="{{ old('remarks', $hotel->remarks)}}"></label>
    </p>
    

    <br>
    <section>
           <button type="submit" class="btn_3"><span>変更する</span></button>
    </section>
</form>
</div>
@endsection