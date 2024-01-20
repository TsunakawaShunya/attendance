<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    // マイページへ
    public function showHome() {
        return view("work.home");
    }

    // 出勤ログへ
    public function showLog() {
        $works = Work::where("user_id", Auth::id())->orderBy("work_start", "desc")->get();      // 新しい順に取り出す
        //dd($works);
        return view("work.log")->with(["works" => $works]);
    }
    
    // 出勤
    public function showWorkStart() {
        return view("work.workStart");
    }
    
    // 出勤開始時刻をポスト
    public function postWorkStart(Request $request) {
        $work_start = $request->input('work_start');

        $work = new Work();
        $work->user_id = Auth::id();
        $work->work_start = $work_start;
        $work->save();
        
        return redirect('/home/work');
    }
    
    // 休憩
    public function showBreak() {
        return view("work.break");
    }
    
    // 休憩開始時刻をポスト
    public function postBreakStart(Request $request) {
        $break_start = $request->input('break_start');

        $work = Work::where("user_id", Auth::id())->latest("updated_at")->first();
        $work->break_start = $break_start;
        $work->save();
        
        return redirect('/home/work/break');
    }

    // 休憩終了時刻をポスト
    public function postBreakEnd(Request $request) {
        $break_end = $request->input('break_end');

        $work = Work::where("user_id", Auth::id())->latest("updated_at")->first();
        $work->break_end = $break_end;
        $work->save();
        
        return redirect('/home/work');
    }

    // 退勤
    public function showWorkEnd() {
        $work = Work::where("user_id", Auth::id())->latest("updated_at")->first();
        return view("work.workEnd")->with(["work" => $work]);
    }
    
    // 出勤終了時刻をポスト
    public function postWorkEnd(Request $request) {
        $work_end = $request->input('work_end');

        $work = Work::where("user_id", Auth::id())->latest("updated_at")->first();
        $work->work_end = $work_end;
        $work->save();
        
        return redirect('/home/work/end');
    }


}
