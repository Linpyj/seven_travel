<dl>
<dt>カテゴリ</dt>
<dd>
    <select name="location_id">
     <!-- カテゴリメニュー-->

        <option value=""></option>
        <!-- カテゴリを選択しない時にセレクトメニューで表示するもの-->

         @foreach ($prefectures as $prefecture)
         <!-- カテゴリーテーブルから1件ずつ取り出す-->
     
            <option value="{{ $prefecture->id}}" {{ request('_id')==$prefecture->id ? 'selected' : '' }}>
            <!-- カテゴリーの名前の表示--><!--選択しているカテゴリID -->
            <!-- リクエストの中のカテゴリIDとバリュー属性のIDが一致したらSELECTEDという属性をつける-->
            <!-- 参考演算式 [条件式 ?（if forの意味） TRUEの処理:FALSEの処理 ] -->

             {{ $prefecture->name }} ({{ $prefecture->hotels_count }})
             <!-- カテゴリーの名前の表示--><!-- カテゴリーごとの製品数の表示-->

            </option>

        @endforeach
    </select>
</dd>
     
<dt>金額</dt>
<dd>
    <input type="number" name="price_min" value="{{ request('price_min') }}" placeholder="円"> 
    <!-- request()ヘルパ関数で現在入力した最小価格を初期値として表示する -->
    ～
    <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="円">
    <!-- request()ヘルパ関数で現在入力した最大価格を初期値として表示する -->

</dd>

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