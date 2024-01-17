<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/home', [WorkController::class, 'showHome'])->name('home.show');
Route::get('/home/log', [WorkController::class, 'showLog'])->name('home.log');
Route::post('/home/work', [WorkController::class, 'postWorkStart'])->name('home.postWorkStart');
Route::get('/home/work', [WorkController::class, 'showWorkStart'])->name('home.showWorkStart');
Route::post('/home/work/end', [WorkController::class, 'postWorkEnd'])->name('home.postWorkEnd');
Route::get('/home/work/end', [WorkController::class, 'showWorkEnd'])->name('home.showWorkEnd');

require __DIR__.'/auth.php';
