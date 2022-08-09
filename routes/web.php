<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [TaskController::class, 'list'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/edit/{id?}', [TaskController::class, 'edit'])->middleware(['auth'])->name('dashboard');
Route::view('/dashboard/add', 'add')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
