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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogueController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('owner')->middleware(['role:owner'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('items', ItemController::class);
        Route::get('items/{item}/details', [ItemController::class, 'details'])->name('items.details');
        Route::post('items/{item}/modify', [ItemController::class, 'modify'])->name('items.modify');
        Route::put('items/{item}/withdraw', [ItemController::class, 'withdraw'])->name('items.withdraw');
        Route::put('items/{item}/restore', [ItemController::class, 'restore'])->name('items.restore');
        
        Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'create']);
        
        Route::get('items/{item}/details', [ItemController::class, 'details'])->name('items.details');
        Route::post('items/{item}/save', [ItemController::class, 'details'])->name('items.save');
        
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    });

    Route::prefix('admin')->middleware(['role:admin'])->group(function () {

        Route::get('/ticket', [TicketController::class, 'index'])->name('tickets.index');
        Route::get('/ticket/add', [TicketController::class, 'add'])->name('tickets.add');
        Route::post('/ticket/store', [TicketController::class, 'store'])->name('tickets.store');
        Route::post('/ticket/destroy/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
        Route::delete('/tickets/{id}/cancel', [TicketController::class, 'cancel'])->name('tickets.cancel');
        Route::post('/tickets/{ticket}/confirm', [TicketController::class, 'confirm'])->name('tickets.confirm');
        Route::post('/tickets/add-item', [TicketController::class, 'addItem'])->name('tickets.addItem');
        Route::delete('/ticket/{ticket}/item/{item}/{id}', [TicketController::class, 'destroyItem'])->name('ticket.item.destroy');
        
        Route::get('/info', [InfoController::class, 'index'])->name('admin.info');
        Route::get('/history', [HistoryController::class, 'index'])->name('admin.history');
    });

});


Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


// Public routes
Route::get('/', [CatalogueController::class, 'index'])->name('catalogue.index');
Route::get('/category', [CatalogueController::class, 'categories'])->name('catalogue.categories');
Route::get('/category/{slug}', [CatalogueController::class, 'categoryDetail'])->name('catalogue.categoryDetail');
Route::get('/collection', [CatalogueController::class, 'collection'])->name('catalogue.collection');
Route::get('/product/{slug}', [CatalogueController::class, 'productDetail'])->name('catalogue.productDetail');
Route::get('/about', [CatalogueController::class, 'about'])->name('catalogue.about');
