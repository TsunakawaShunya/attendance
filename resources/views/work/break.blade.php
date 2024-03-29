<x-app-layout>
    <x-slot name="title">勤務中</x-slot>
    <x-slot name="header">WORKTIME</x-slot>
    
    <main>
        <div class="text-gray-800 font-bold font-mono text-center text-3xl m-1">
            勤務中
        </div>

        <div class="text-gray-800 font-mono text-right text-base" id="currentDate">
            {{ \Carbon\Carbon::now()->format('Y年n月j日 (D)') }}
        </div>
        
        <div class="text-gray-800 font-bold font-mono text-center text-5xl" id="currentTime">
            {{ \Carbon\Carbon::now()->format('H:i:s') }}
        </div>
        
        <div class="flex justify-center m-5">
            <form id="breakEndForm" action="/home/work/breakend" method="POST">
                @csrf
                <input type="hidden" name="break_end" id="break_end"/>
                <div class="border-4 border-solid border-orange-500 bg-orange-50 p-2 m-3 font-mono text-center text-5xl">
                    <input type="submit" value="休憩終了" onclick="submit_breakEndForm()">
                </div>
            </form>
        </div>
    </main>
    
    <script>
        // ボタンを押したタイミングの時刻を送信
        function submit_breakEndForm() {
            // 出勤ボタンが押された時の現在時刻を取得し、input要素のvalueにセットする
            document.getElementById('break_end').value = new Date().toLocaleString().slice(0, 19).replace("T", " ");
            // フォームを送信する
            document.getElementById('breakEndForm').submit();
        }

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