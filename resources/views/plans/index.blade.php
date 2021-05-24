@extends('layouts.app')

@section('content')
    <form action="{{ route('plans.index')}}" method="get">


        @csrf
        @include('plans.search')

        <!--サーチファイルの差し込み -->
        <button type="submit">検索</button>
    </form>

            @foreach($plans as $plan)
            <!-- 検索結果を連想配列として一つずつ取り出して表示 -->
                <tr>
                    <td>{{ $plan }}</td>
                    
                </tr>
            @endforeach

    
     
     <!-- ページネーションを自動的に付与 -->
 @endsection