<?php

use App\Http\Controllers\ProposalController;
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

Route::get('/', [ProposalController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/proposal/create', [ProposalController::class,'create'])->middleware(['auth'])->name('proposal.create');
Route::get('/proposal/{proposal}/edit', [ProposalController::class,'edit'])->middleware(['auth'])->name('proposal.edit');

require __DIR__.'/auth.php';
