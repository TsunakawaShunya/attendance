<x-app-layout>
    <x-slot name="title">出勤ログ</x-slot>
    <x-slot name="header">WORKTIME</x-slot>
    <main>
        <div class="text-gray-800 font-bold font-mono text-center text-3xl m-1">
            <h1>{{ Auth::user()->name }}さん</h1>
        </div>
        
        @php
            $previousMonth = null;
            $totalMonthlyEarnings = 0; // 月給の合計
        @endphp
        
        @foreach($works as $work)
            @if($work->work_start != null && $work->work_end != null)
                @php
                    $currentMonth = \Carbon\Carbon::parse($work->work_start)->format('Y-m');
                    // 働いた時間（分）
                    if($work->break_start && $work->break_end){
                        $workedMinutes = (\Carbon\Carbon::parse($work->work_end)->diffInMinutes(\Carbon\Carbon::parse($work->work_start))) - (\Carbon\Carbon::parse($work->break_end)->diffInMinutes(\Carbon\Carbon::parse($work->break_start)));
                    } else{
                        $workedMinutes = (\Carbon\Carbon::parse($work->work_end)->diffInMinutes(\Carbon\Carbon::parse($work->work_start)));
                    }
                    // 一日の給料
                    $dailyEarnings = floor(Auth::user()->hourly_wage * ($workedMinutes / 60)); // 切り捨て
                @endphp
                
                @if($currentMonth != $previousMonth)
                    @if($previousMonth != null)
                        <tr>
                            <td class="font-bold mb-2">合計</td>
                            <td class="text-xl">{{ $totalMonthlyEarnings + $user->monthly_wage }} 円</td>
                        </tr>
                        </table>
                    @endif
                    <div class="text-2xl mt-8">{{ \Carbon\Carbon::parse($work->work_start)->format('Y年m月') }}</div>
                    <table class="table-auto w-full border-collapse border border-gray-500 m-auto">
                        <tr>
                            <th class="border border-gray-500 p-2">出勤日</th>
                            <th class="border border-gray-500 p-2">出勤時刻</th>
                            <th class="border border-gray-500 p-2">退勤時刻</th>
                            <th class="border border-gray-500 p-2">休憩開始時刻</th>
                            <th class="border border-gray-500 p-2">休憩終了時刻</th>
                            <th class="border border-gray-500 p-2">勤務時間</th>
                            <th class="border border-gray-500 p-2">日給</th>
                        </tr>
                        
                        @php
                            $totalMonthlyEarnings = 0; // 月給の合計を初期化
                        @endphp
                @endif
                
                <tr>
                    <td class="border border-gray-500 p-2">{{ \Carbon\Carbon::parse($work->work_start)->format('Y-m-d') }}</td>
                    <td class="border border-gray-500 p-2">{{ \Carbon\Carbon::parse($work->work_start)->format('H:i:s') }}</td>
                    <td class="border border-gray-500 p-2">{{ \Carbon\Carbon::parse($work->work_end)->format('H:i:s') }}</td>
                    <td class="border border-gray-500 p-2">{{ $work->break_start ? \Carbon\Carbon::parse($work->break_start)->format('H:i:s') : '-' }}</td>
                    <td class="border border-gray-500 p-2">{{ $work->break_end ? \Carbon\Carbon::parse($work->break_end)->format('H:i:s') : '-' }}</td>
                    <td class="border border-gray-500 p-2">{{ \Carbon\CarbonInterval::seconds(\Carbon\Carbon::parse($work->work_end)->diffInSeconds(\Carbon\Carbon::parse($work->work_start)) - (\Carbon\Carbon::parse($work->break_end)->diffInSeconds(\Carbon\Carbon::parse($work->break_start))))->cascade()->format('%H:%I:%S') }}</td>
                    <td class="border border-gray-500 p-2">{{ $dailyEarnings }} 円</td>
                    @php
                        $totalMonthlyEarnings += $dailyEarnings; // 日給を月給の合計に加算
                    @endphp
                </tr>
                
                @php
                    $previousMonth = $currentMonth;
                @endphp
            @endif
        @endforeach
        
        @if($previousMonth != null)
            <tr>
                <td class="font-bold mb-2">合計</td>
                <td class="text-xl">{{ $totalMonthlyEarnings + $user->monthly_wage }} 円</td>
            </tr>
            </table>
        @endif
    </main>
</x-app-layout>
