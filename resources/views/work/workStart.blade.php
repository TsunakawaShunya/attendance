<x-app-layout>
    <x-slot name="title">勤務中</x-slot>
    <x-slot name="header">WORKTIME</x-slot>
    
    <main>
        <div class="name">
            <h1>勤務中</h1>
        </div>
        
        <div class="to-workLog">
            <a href="/home/log">出勤ログ</a>
        </div>
        
        <div class="date" id="currentDate">
            {{ \Carbon\Carbon::now()->format('Y年n月j日 (D)') }}
        </div>
        
        <div class="time" id="currentTime">
            {{ \Carbon\Carbon::now()->format('H:i:s') }}
        </div>
        
        <form action="/home/work/end" method="POST">
            @csrf
            <input type="hidden" name="work_end" value="{{ now() }}"/>
            <input type="submit" value="退勤">
         </form>
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