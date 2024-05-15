<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Users
Route::group(['prefix' => 'users', 'as' => 'user.', 'controller' => UserController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'showCreateForm')->name('create');
    Route::post('/create', 'create');
});

//Users
Route::group(['prefix' => 'transactions', 'as' => 'transaction.', 'controller' => TransactionController::class], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/deposit', 'deposit')->name('deposit.index');
    Route::get('/deposit/create', 'showDepositCreateForm')->name('deposit.create');
    Route::post('/deposit/create', 'depositCreate');

    Route::get('/withdraw', 'withdraw')->name('withdraw.index');
    Route::get('/withdraw/create', 'showWithdrawCreateForm')->name('withdraw.create');
    Route::post('/withdraw/create', 'withdrawCreate');
});
