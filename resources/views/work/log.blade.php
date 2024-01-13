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
                <a href="/home">戻る</a>

                <div class="name">
                    <h1>{{ Auth::user()->name }}さん</h1>
                </div>
                
                <table border="1">
                    <tr>
                        <th>出勤日</th>
                        <th>出勤時間</th>
                    </tr>
                    @foreach($works as $work)
                        @if($work->work_start != null && $work->work_end != null)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($work->work_start)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($work->work_start)->diff(\Carbon\Carbon::parse($work->work_end))->format('%H:%I:%S') }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                
            </main>
        </body>
    </html>
</x-app-layout>