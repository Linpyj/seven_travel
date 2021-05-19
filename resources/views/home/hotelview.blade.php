@extends('layouts.app')

@section('content')

    <form action="{{ route('top')}}" method="get">
        <!-- トップへＧＥＴメソッドで送りだす -->
        @include('search')
        <!--サーチファイルの差し込み -->
        <button type="submit">検索</button>
    </form>

    
        
        

            @foreach($products as $product)
            <!-- 検索結果を連想配列として一つずつ取り出して表示 -->
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <!-- カテゴリーテーブルの名前を呼び出す-->
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach

    
     {{ $products->appends(Request::all())->links() }}
     <!-- ページネーションを自動的に付与 -->
 @endsection