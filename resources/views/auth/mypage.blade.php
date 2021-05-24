@extends('layouts.app')

@section('content')
<h1>マイページ</h1>
    <table>
        <tr>
            <td><a href="{{ route('users.edit', \Auth::id()) }}">会員情報編集</a></td>
            <td><a href="{{ route('reservations.index') }}">過去の予約</a></td>
            <td><a href="" onclick="logout()">ログアウト</a></td>
            <form action="{{ route('logout') }}" id="logout-form" method="post">
                @csrf
            </form>
            <script type="text/javascript">
                function logout() {
                    event.preventDefault();
                    if(window.confirm('ログアウトしますか？')){
                        document.getElementById('logout-form').submit();
                    }
                }
            </script>
        </tr>
    </table>
<h2>会員詳細情報</h2>
    <table border="1">
        <tr>
            <th>名前</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>生年月日</th>
            <th>パスワード</th>
        </tr>
        <tr>
            <td>{{ Auth::user()->name }}</td>
            <td>{{ Auth::user()->address }}</td>
            <td>{{ Auth::user()->tel }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>{{ Auth::user()->birthday }}</td>
            <td>{{ Auth::user()->password }}</td>
        </tr>
    </table>
<h2>現在の予約一覧</h2>
    @foreach ($reservations as $reservation)
        <h2>{{ $reservation->plan->hotel->name }}：{{ $reservation->plan->name }}</h2>
        <p>チェックイン日{{ $reservation->check_in }}チェックアウト日{{ $reservation->check_out }}</p>
        <a href="" onclick="reservation_destroy()">予約キャンセル</a>
        <form action="{{ route('reservations.destroy', $reservation->id) }}" id="reservation-destroy-form" method="post">
            @csrf
            @method('delete')
        </form>
        <script type="text/javascript">
            function reservation_destroy() {
                event.preventDefault();
                if(window.confirm('本当に予約をキャンセルしてもよろしいですか？')){
                    document.getElementById('reservation-destroy-form').submit();
                }
            }
        </script>
    @endforeach
    <a href="{{ route('home') }}">戻る</a>
    <a href="{{ route('users.destroy', \Auth::id()) }}" onclick="deleteUser()">退会する</a>
            <form action="{{ route('users.destroy', \Auth::id()) }}" method="POST" id="delete-form">
                @csrf
                @method('delete')
            </form>
            <script type="text/javascript">
                function deleteUser(){
                    event.preventDefault();
                    if(window.confirm('退会すると現在お取りしている予約もキャンセルされます。')){
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>    
@endsection