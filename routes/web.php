<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\HistoryController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('items', ItemController::class);
Route::get('items/{item}/details', [ItemController::class, 'details'])->name('items.details');
Route::post('items/{item}/modify', [ItemController::class, 'modify'])->name('items.modify');

Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'create']);


Route::get('items/{item}/details', [ItemController::class, 'details'])->name('items.details');
Route::post('items/{item}/save', [ItemController::class, 'details'])->name('items.save');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/ticket', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/ticket/add', [TicketController::class, 'add'])->name('tickets.add');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('tickets.store');
Route::post('/ticket/destroy/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/info', [InfoController::class, 'index'])->name('admin.info');
Route::get('/history', [HistoryController::class, 'index'])->name('admin.history');



Route::get('/about', function () {
    return view('about');
});
