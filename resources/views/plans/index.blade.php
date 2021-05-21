@extends('layouts.app')

@section('content')

    <form action="{{ route('index')}}" method="post">
        @csrf
        @include('plans.search')
        <!--サーチファイルの差し込み -->
        <button type="submit">検索</button>
    </form>

            {{-- @foreach($plans as $plan)
            <!-- 検索結果を連想配列として一つずつ取り出して表示 -->
                <tr>
                    <td>{{ $plan->hotel->image }}</td>
                    <td><a href="{{ route ('hotels.show', $hotel->id) }}">{{ $plan->hotel->name }}</a></td>
                    <td><a href="{{ route ('plans.show', $plan->id) }}">{{ $plan->name }}</a></td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach

    
     {{ $products->appends(Request::all())->links() }} --}}
     <!-- ページネーションを自動的に付与 -->
 @endsection