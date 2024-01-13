<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 21;
        $date = now()->subDays(30); // 30日前から

        for ($i = 0; $i < 30; $i++) {
            $workStart = $date->copy()->setHours(rand(8, 11))->setMinutes(rand(0, 59));
            $workEnd = $date->copy()->setHours(rand(16, 18))->setMinutes(rand(0, 59));
            $breakStart = $date->copy()->setHours(rand(13, 15))->setMinutes(rand(0, 59));
            $breakEnd = $breakStart->copy()->addMinutes(rand(30, 60));

            DB::table('works')->insert([
                'user_id' => $userId,
                'work_start' => $workStart,
                'work_end' => $workEnd,
                'break_start' => $breakStart,
                'break_end' => $breakEnd,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // dateをインクリメント
            $date->addDay();
        }
    }
}
