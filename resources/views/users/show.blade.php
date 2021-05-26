@extends('layouts.app')

@section('content')
<h1>会員詳細ページ</h1>

<div class="old-form">
@foreach($user as $item)
<dl>
    <dt>ID</dt>
    <dd>{{ $item->id }}</dd>
    
    <dt>ユーザ名</dt>
    <dd>{{ $item->name }}</dd>

    <dt>メールアドレス</dt>
    <dd>{{ $item->email }}</dd>

    <dt>生年月日</dt>
    <dd>{{ $item->birthday }}</dd>

    <dt>電話番号</dt>
    <dd>{{ $item->tel }}</dd>
</dl>
</div>

<br>
<section>
       <a href="{{ route('users.index') }}" class="btn_1"><span>戻る</span></a>
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

<br>
<section>
    <a href="{{ route('hotels.index') }}" class="btn_1"><span>ホームに戻る</span></a>
</section>

@endforeach

@endsection