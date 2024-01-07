<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthController;

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
  return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
  Route::resource('customers', CustomerController::class)->except('show');
  Route::resource('cashiers', CashierController::class)->except('show');
  Route::resource('products', ProductController::class)->except('show');
  Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
  Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
  Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
  Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.detail');
});
