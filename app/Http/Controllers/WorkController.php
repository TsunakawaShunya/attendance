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
        $works = Work::where("user_id", Auth::id())->get();
        //dd($works);
        return view("work.log")->with(["works" => $works]);
    }

}
