<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name')}}</title>
    <link rel="stylesheet" href="/css/main_style.css">

</head>
<body>
    
    <header>
        <div class="header">
            <a class="nav-item brand" href="/">SEVEN TRAVEL</a> 
            @include('commons/nav')
            <!-- config関数（configディレクト内のappファイルの中で設定項目名としてnameを反映）-->
            <!-- 'name' => env('APP_NAME', 'Laravel'), envファイルで定義したアプリケーション名-->
        </div>
    </header>
    
    <main>
        <div class="container">
           @yield('content')
        </div>
    </main>

    <footer>
        <div class="footer">
            @include('commons/footer')
        </div>
    </footer>
</body>
</html>