<ul class="navigation">      
    @if (Auth::user())
        <li ><a href="{{ route('plans.index') }}" class="navigation">プラン検索</a></li>
        <li><a href="{{ route('users.show',\Auth::id()) }}" class="navigation">マイぺージ</a></li>
        @if(Auth::user()->is_admin)
            <li><a href="{{ route('hotels.create') }}" class="navigation">ホテルを追加する</a></li>
            <li><a href="{{ route('home') }}" class="navigation">会員一覧</a></li>
        @endif
    @endif 
</ul>

