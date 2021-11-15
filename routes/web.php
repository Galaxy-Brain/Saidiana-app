<?php

use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Employer\Dashboard as EmployerDashboard;
use App\Http\Livewire\Jobseeker\Dashboard as JobseekerDashboard;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
});
Route::prefix('employer')->middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/dashboard', EmployerDashboard::class)->name('employer.dashboard');
});
Route::prefix('jobseeker')->middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/dashboard', JobseekerDashboard::class)->name('jobseeker.dashboard');
});
