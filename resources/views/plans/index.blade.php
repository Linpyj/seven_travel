@extends('layouts.app')

@section('content')
    <form action="{{ route('plans.index')}}" method="get">


        @csrf
        @include('plans.search')

        <!--サーチファイルの差し込み -->
        <button type="submit">検索</button>
    </form>

            
           
        <table>
            <thead>
                <tr>
                    <th>所在地</th>
                    <th>ホテル名</th>
                    <th>プラン名</th>
                    <th>値段</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($plans as $plan)
                <tr>
                    <td>{{ $plan['hotel']['prefecture'] }}</td>
                    <td>{{ $plan['hotel']['name'] }}</td>
                    <td>{{ $plan['name'] }}</td>
                    <td>{{ $plan['price'] }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
    
     
     <!-- ページネーションを自動的に付与 -->
 @endsection