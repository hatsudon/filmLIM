<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>FilmLIM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-[#F2E8DC]">
        
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container mx-auto">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')
            
            <div id="app">
            @yield('content')
            </div>
        </div>
    </body>
</html>