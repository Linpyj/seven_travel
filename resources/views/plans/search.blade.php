<dl>
{{-- <dt>所在地</dt>
<dd>
    <select name="location_id">
     

        <option value=""></option>
        

         @foreach ($prefectures as $prefecture)
     
            <option value="{{ $prefecture->id}}" {{ request('_id')==$prefecture->id ? 'selected' : '' }}>
             {{ $prefecture->name }} ({{ $prefecture->hotels_count }})
             <!-- カテゴリーの名前の表示--><!-- カテゴリーごとの製品数の表示-->

            </option>

        @endforeach
    </select>
</dd> --}}
     
{{-- <dt>金額</dt>
<dd>
    <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="円"> 
    <!-- request()ヘルパ関数で現在入力した最小価格を初期値として表示する -->
    ～
    <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="円">
    <!-- request()ヘルパ関数で現在入力した最大価格を初期値として表示する -->

</dd> --}}

<dt>チェックイン日</dt>
<dd>
    <input type="date" name="check_in" value="{{ request('check_in') }}" placeholder="xxxx/xx/xx"> 
    <!-- request()ヘルパ関数で現在入力したキーワードを初期値として表示する -->
</dd>

<dt>チェックアウト日</dt>
<dd>
    <input type="date" name="check_out" value="{{ request('check_out') }}" placeholder="xxxx/xx/xx"> 
    <!-- request()ヘルパ関数で現在入力したキーワードを初期値として表示する -->
</dd>

</dl>