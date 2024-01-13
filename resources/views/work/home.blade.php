<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>worktime</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <header>
                <h1>WorkTime</h1>
            </header>
            
            <main>
                <div class="name">
                    <h1>こんにちは！{{ Auth::user()->name }}さん！</h1>
                </div>
                
                <div class="to-workLog">
                    <a href="/home/{{ Auth::id() }}/log">出勤ログ</a>
                </div>
                
                <div class="date">
                    
                </div>
            </main>
        </body>
    </html>
</x-app-layout>