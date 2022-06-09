<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
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

Route::get('/test', [TestController::class, 'test'])->name('test');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'customer'], function(){
        # ROUTE NEXT-CUSTOMER & USER.INACTIVE
        Route::middleware(['for.user.inactive'])->group(function(){
            Route::get('/nextcustomer', [CustomerController::class, 'nextcustomer'])->name('nextcustomer');
            Route::post('/nextcustomer/add', [CustomerController::class, 'addcustomer'])->name('nextcustomer.add');
        });
        # AJAX QUERY GET INDO-REGION
        Route::get('/province', [AjaxController::class, 'getProvince'])->name('province');
        Route::get('/regency/{id}', [AjaxController::class, 'getRegency'])->name('regency');
        Route::get('/district/{id}', [AjaxController::class, 'getDistrict'])->name('district');
        Route::get('/village/{id}', [AjaxController::class, 'getVillage'])->name('village');

        # MIDDLEWARE USER.ACTIVE
        Route::middleware(['for.user.active', 'superadmin'])->group(function(){
            Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::post('/update', [CustomerController::class, 'update'])->name('customer.update');
            Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customer.show');

            # JQUERY
            Route::get('/getalldata', [CustomerController::class, 'getAllData'])->name('customer.getAllData');
        });
    });
});

require __DIR__.'/auth.php';
