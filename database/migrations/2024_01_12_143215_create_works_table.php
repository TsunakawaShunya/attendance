<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');       // ユーザーID
            $table->timestamp('work_start')->nullable();        // 出勤日時
            $table->timestamp('work_end')->nullable();      // 退勤日時
            $table->timestamp('break_start')->nullable();       // 休憩開始日時
            $table->timestamp('break_end')->nullable();     // 休憩終了時刻
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
