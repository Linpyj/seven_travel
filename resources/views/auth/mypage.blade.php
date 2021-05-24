@extends('layouts.app')

@section('content')
<h1>マイページ</h1>
    
<h2>会員詳細情報</h2>
    <table>
        <tr><th>名前</th><td>{{ Auth::user()->name }}</td></tr>
        <tr><th>住所</th><td>{{ Auth::user()->address }}</td></tr>
        <tr><th>電話番号</th><td>{{ Auth::user()->tel }}</td></tr>
        <tr><th>メールアドレス</th><td>{{ Auth::user()->email }}</td>
        <tr><th>生年月日</th><td>{{ Auth::user()->birthday }}</td></tr>
    </table>
    <br>
    <section>
        <a href="{{ route('users.edit', \Auth::id()) }}" class="btn_3"><span>会員情報を編集する</span></a>
    </section>
    
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
    
    <br>
    <section>
        <a href="{{ route('reservations.index') }}" class="btn_3"><span>過去の予約を見る</span></a>
    </section>


<h2>ログアウトメニュー</h2>

    <br>
     <section>
        <a href="" onclick="logout()" class="btn_3"><span>ログアウトする</span></a>
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

<h2>退会メニュー</h2>
    <p class="script">退会すると現在の予約はすべてキャンセルされます。</p>
    <br>
    <section>
        <a href="{{ route('users.destroy', \Auth::id()) }}" onclick="deleteUser()" class="btn_4"><span>退会する</span></a>
    </section>

            <form action="{{ route('users.destroy', \Auth::id()) }}" method="POST" id="delete-form">
                @csrf
                @method('delete')
            </form>
            <script type="text/javascript">
                function deleteUser(){
                    event.preventDefault();
                    if(window.confirm('退会すると現在お取りしている予約もキャンセルされます。よろしいですか？')){
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>    
    

@endsection