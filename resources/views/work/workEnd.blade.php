<x-app-layout>
    <x-slot name="title">勤務終了</x-slot>
    <x-slot name="header">WORKTIME</x-slot>

    <main>
        <div class="name">
            <h1>お疲れさまでした！！</h1>
        </div>
        
        <div class="date" id="currentDate">
            {{ \Carbon\Carbon::now()->format('Y年n月j日 (D)') }}
        </div>
        
        <div class="time" id="currentTime">
            {{ \Carbon\Carbon::now()->format('H:i:s') }}
        </div>
        
        <div class="work-time">
            <h1>勤務時間</h1>
            {{ \Carbon\Carbon::parse($work->work_start)->diff(\Carbon\Carbon::parse($work->work_end))->format('%H:%I:%S') }}
        </div>
        
        <a href="/home">トップページ</a>
    </main>
    <script>
        // JavaScriptで時刻をリアルタイムに更新
        function updateClock() {
            let currentDateElement = document.getElementById('currentDate');
            let currentTimeElement = document.getElementById('currentTime');

            let currentDate = new Date();
            let hours = ('0' + currentDate.getHours()).slice(-2);
            let minutes = ('0' + currentDate.getMinutes()).slice(-2);
            let seconds = ('0' + currentDate.getSeconds()).slice(-2);

            currentDateElement.textContent = '{{ \Carbon\Carbon::now()->format("Y年n月j日 (D)") }}';
            currentTimeElement.textContent = hours + ':' + minutes + ':' + seconds;

            // 1秒ごとにupdateClockを呼び出して時刻を更新
            setTimeout(updateClock, 1000);
        }

        // 初回呼び出し
        updateClock();
    </script>
</x-app-layout>