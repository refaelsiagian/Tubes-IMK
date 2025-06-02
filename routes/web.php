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
use App\Http\Controllers\StockController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\UpdateEmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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
        Route::get('/dashboard/chart', [DashboardController::class, 'chart'])->name('dashboard.chart');
        Route::get('/dashboard/stock', [DashboardController::class, 'stock'])->name('dashboard.stock');
        
        Route::post('items/{id}/force-delete', [ItemController::class, 'destroy'])->name('items.force-delete');
        Route::resource('items', ItemController::class)->except(['show', 'destroy']);
        Route::get('items/{item}/details', [ItemController::class, 'details'])->name('items.details');
        Route::post('items/{item}/modify', [ItemController::class, 'modify'])->name('items.modify');
        Route::put('items/{item}/withdraw', [ItemController::class, 'withdraw'])->name('items.withdraw');
        Route::put('items/{item}/restore', [ItemController::class, 'restore'])->name('items.restore');
        Route::get('items/print', [ItemController::class, 'print'])->name('items.print');
        
        Route::resource('categories', CategoryController::class)->except(['show', 'edit', 'create']);
        
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/print' , [TransactionController::class, 'print'])->name('transactions.print');

        // Form input email lama
        Route::get('/change-email', [ChangeEmailController::class, 'showChangeEmailForm'])->name('change-email.show');

        // Proses verifikasi email lama
        Route::post('/change-email', [ChangeEmailController::class, 'verifyOldEmail'])->name('change-email.verify');

        // Nanti untuk step selanjutnya:
        Route::get('/update-email', [UpdateEmailController::class, 'showUpdateEmailForm'])->name('update-email.show');

        // Input email baru
        Route::get('/update-email', [UpdateEmailController::class, 'showUpdateEmailForm'])->name('update-email.show');
        Route::post('/update-email', [UpdateEmailController::class, 'updateEmail'])->name('update-email.submit');

        // Halaman info pending
        Route::get('/email-pending', [UpdateEmailController::class, 'emailPending'])->name('email-pending');

        // Verifikasi email baru via link
        Route::get('/verify-new-email/{user}/{hash}', [UpdateEmailController::class, 'verifyNewEmail'])->name('verify-new-email');

        // Kirim ulang email verifikasi
        Route::post('/resend-email', [UpdateEmailController::class, 'resendEmail'])->name('resend-email');


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

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/change-password', [ProfileController::class, 'change_password'])->name('profile.change-password');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/get-stock', [StockController::class, 'getStock']);

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

// Public routes
Route::get('/', [CatalogueController::class, 'index'])->name('catalogue.index');
Route::get('/category', [CatalogueController::class, 'categories'])->name('catalogue.categories');
Route::get('/category/{slug}', [CatalogueController::class, 'categoryDetail'])->name('catalogue.categoryDetail');
Route::get('/collection', [CatalogueController::class, 'collection'])->name('catalogue.collection');
Route::get('/product/{slug}', [CatalogueController::class, 'productDetail'])->name('catalogue.productDetail');
Route::get('/about', [CatalogueController::class, 'about'])->name('catalogue.about');
