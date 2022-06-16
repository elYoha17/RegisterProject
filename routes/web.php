<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterManagmentController;
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

Route::middleware('auth')->group(function () {
    Route::resource('registers', RegisterController::class);
    Route::resource('agents', AgentController::class);
    
    Route::get('registers/{register}/manage', [RegisterManagmentController::class, 'manage'])->name('registers.manage');
    Route::post('registers/{register}/manage/{agent}', [RegisterManagmentController::class, 'add'])->name('registers.add');
    Route::delete('registers/{register}/manage/{agent}', [RegisterManagmentController::class, 'remove'])->name('registers.remove');
    
    Route::get('registers/{register}/count', [RegisterManagmentController::class, 'count'])->name('registers.agents');

    Route::redirect('/', '/registers')->name('home');
});



require __DIR__.'/auth.php';
