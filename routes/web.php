<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'customer'], function(){
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update', [CustomerController::class, 'update'])->name('customer.update');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('/getalldata', [CustomerController::class, 'getAllData'])->name('customer.getAllData');
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
