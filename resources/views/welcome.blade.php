<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WORKTIMEトップページ</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main>
            <header class="bg-sky-600 text-gray-800 font-bold text-center text-3xl">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    WORKTIME
                </div>
            </header>
            
            <div class="text-gray-800 text-center text-base my-10">
                <a href="/login">ログイン</a>
            </div>
            
            <div class="text-gray-800 text-center text-base my-10">
                <a href="/register">新規登録</a>
            </div>
        </main>
    </body>
</html>
