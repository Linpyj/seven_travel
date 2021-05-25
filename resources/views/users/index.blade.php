@extends('layouts.app')

@section('content')
    <form action="{{ route('users.index')}}" method="get">
        @csrf
        @include('users.search')

        <!--サーチファイルの差し込み -->
        <section>
            <button type="submit" class="btn_2"><span>検索</span></button>
        </section>
    </form>

        @if (count($users) == 0)
            <p>該当項目なし</p>
        @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>住所</th>
                            <th>生年月日</th>
                            <th>電話番号</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}"
                                       style="text-decoration: none;"
                                >{{ $user->id }}</a></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>{{ $user->tel }}</td>
                            </tr>
                        @endforeach            
                    </tbody>
                </table>
        
        @endif

 @endsection