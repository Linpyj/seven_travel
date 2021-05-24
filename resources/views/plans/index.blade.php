@extends('layouts.app')

@section('content')
    <form action="{{ route('plans.index')}}" method="get">


        @csrf
        @include('plans.search')

        <!--サーチファイルの差し込み -->
        <button type="submit">検索</button>
    </form>

            
        @if (count($plans) != 0)
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
                        <td><a href="{{ route('hotels.show', ['hotel' => $plan['hotel']['id']]) }}">{{ $plan['hotel']['name'] }}</a></td>
                        <td><a href="{{ route('plans.show', $plan['id']) }}">{{ $plan['name'] }}</a></td>
                        <td>{{ $plan['price'] }}</td>
                    </tr>
                @endforeach            
            </tbody>
            </table>
        @else
            <p>申し訳ございません。検索条件に該当するプランはありません。</p>
        @endif
    
     
     <!-- ページネーションを自動的に付与 -->
 @endsection