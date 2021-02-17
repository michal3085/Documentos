<?php

use App\Http\Controllers\InvoicesController;
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
    return view('index');
});

Route::get('/faktury', [InvoicesController::class, 'index'])->name('invoices.index');

Route::get('/faktury/dodaj', [InvoicesController::class, 'create'])->name('invoices.create');

Route::post('/faktury/dodaj/zapisz', [InvoicesController::class, 'store'])->name('invoices.store');
