<x-app-layout>
    <x-slot name="title">出勤ログ</x-slot>
    <x-slot name="header">WORKTIME</x-slot>
    <main>
        <div class="name">
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
                    $workedMinutes = \Carbon\Carbon::parse($work->work_start)->diffInMinutes(\Carbon\Carbon::parse($work->work_end)); // 働いた時間（分）
                    $dailyEarnings = floor(Auth::user()->hourly_wage * ($workedMinutes / 60)); // 切り捨て
                @endphp
                
                @if($currentMonth != $previousMonth)
                    @if($previousMonth != null)
                        <tr>
                            <td colspan="4">合計</td>
                            <td>{{ $totalMonthlyEarnings }} 円</td>
                        </tr>
                        </table>
                    @endif
                    <h2>{{ \Carbon\Carbon::parse($work->work_start)->format('Y年m月') }}</h2>
                    <table border="1">
                        <tr>
                            <th>出勤日</th>
                            <th>出勤時刻</th>
                            <th>退勤時刻</th>
                            <th>勤務時間</th>
                            <th>日給</th>
                        </tr>
                        
                        @php
                            $totalMonthlyEarnings = 0; // 月給の合計を初期化
                        @endphp
                @endif
                
                <tr>
                    <td>{{ \Carbon\Carbon::parse($work->work_start)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($work->work_start)->format('H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($work->work_end)->format('H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($work->work_start)->diff(\Carbon\Carbon::parse($work->work_end))->format('%H:%I:%S') }}</td>
                    <td>{{ $dailyEarnings }} 円</td>
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
                <td colspan="4">合計</td>
                <td>{{ $totalMonthlyEarnings }} 円</td>
            </tr>
            </table>
        @endif
    </main>
</x-app-layout>
