<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // トップページへ
    public function showIndex() {
        return view("work.index");
    }
}
