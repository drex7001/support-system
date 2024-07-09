<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [\App\Http\Controllers\TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [\App\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');

Route::get('/tickets/{ticket}', [\App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');

Route::post('/tickets/{ticket}/reply', [\App\Http\Controllers\ReplyController::class, 'store'])->name('reply.create');
Route::patch('/tickets/{ticket}', [\App\Http\Controllers\TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [\App\Http\Controllers\TicketController::class, 'destroy'])->name('tickets.destroy');

// Route::get('/', [TicketController::class, 'create']);
// Route::post('/ticket', [TicketController::class, 'store']);
// Route::get('/ticket/status', [TicketController::class, 'status']);
// Route::post('/ticket/status', [TicketController::class, 'checkStatus']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
//     Route::get('/ticket/{ticket}', [TicketController::class, 'show']);
//     Route::post('/ticket/{ticket}/reply', [ReplyController::class, 'store']);
// });

require __DIR__ . '/auth.php';
