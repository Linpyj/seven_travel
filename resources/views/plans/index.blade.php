@extends('layouts.app')

@section('content')
    <form action="{{ route('plans.index')}}" method="get">
        @csrf
        @include('plans.search')

        <!--サーチファイルの差し込み -->
        <section>
            <button type="submit" class="btn_2"><span>検索</span></button>
        </section>
    </form>

    @if (count($plans) == 0)
        @if (count($error) == 0)
            <p>申し訳ございません。検索条件に該当するプランはありません。</p>
        @else
            <p>日時指定は必須です。</p>
        @endif
    @else
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
                        <td><a href="{{ route('hotels.show', ['hotel' => $plan['hotel']['id']]) }}"
                               style="text-decoration: none;"
                            >
                            {{ $plan['hotel']['name'] }}
                            </a></td>
                        <td><a href="{{ route('plans.show', $plan['id']) }}"
                               style="text-decoration: none;"
                            >
                            {{ $plan['name'] }}
                            </a></td>
                        <td>{{ $plan['price'] }}</td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    @endif
 @endsection