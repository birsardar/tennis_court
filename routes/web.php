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

// Routes that are accessible only to authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProposalController::class, 'index'])->name('dashboard');
    Route::get('/proposal/create', [ProposalController::class, 'create'])->name('proposal.create');
    Route::get('/proposal/{proposal}/edit', [ProposalController::class, 'edit'])->name('proposal.edit');
    Route::get('/proposal/{proposal}', [ProposalController::class, 'destroy'])->name('proposal.destroy');
    Route::get('/proposals/{proposal}/pdf', [ProposalController::class, 'generatePdf'])->name('proposal.pdf');
    Route::get('/proposal/{proposal}/pdf', [ProposalController::class, 'show'])->name('proposal.show');
});

require __DIR__ . '/auth.php';
