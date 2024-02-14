<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WORKTIME トップページ</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-blue-300 max-h-full">
      <header class="bg-gray-400 text-gray-800 font-bold font-mono text-3xl">
        <div class="text-center text-base p-2 flex justify-end">
          <ul>
            <li class="p-2 text-lg font-bold"><a href="/login">ログイン</a></li>
            <li class="p-2 text-lg font-bold"><a href="/register">新規登録</a></li>
          </ul>
        </div>
      </header>

      <main>
        <div class="text-gray-800 font-bold font-mono text-center text-3xl p-4">
          WORKTIME
        </div>
        
        <div class="text-gray-800 font-bold font-mono text-center text-xl p-4 flex justify-center">
          <ul>
            <li>
              自分で打刻や出勤記録を確認できるアプリ
            </li>
          </ul>
        </div>
        
        <div class="flex justify-end">
            <div class="bg-white p-2 mx-4 my-2 w-1/4">
                <h1 class="text-lg font-bold">テストユーザー</h1>
                <div class="text-center">test01</div>
                <h1 class="text-lg font-bold">メールアドレス</h1>
                <div class="text-center">test01@mail.com</div>
                <h1 class="text-lg font-bold">パスワード</h1>
                <div class="text-center">test1test1</div>
                <h1 class="text-lg font-bold">時給</h1>
                <div class="text-center">1000 円</div>
                <h1 class="text-lg font-bold">月給</h1>
                <div class="text-center">0 円</div>
            </div>
          
            <div class="bg-white p-2 mx-4 my-2 w-1/4">
                <h1 class="text-lg font-bold">テストユーザー</h1>
                <div class="text-center">test02</div>
                <h1 class="text-lg font-bold">メールアドレス</h1>
                <div class="text-center">test02@mail.com</div>
                <h1 class="text-lg font-bold">パスワード</h1>
                <div class="text-center">test2test2</div>
                <h1 class="text-lg font-bold">時給</h1>
                <div class="text-center">0 円</div>
                <h1 class="text-lg font-bold">月給</h1>
                <div class="text-center">200000 円</div>
            </div>
        </div>
      </main>
    </body>
</html>
