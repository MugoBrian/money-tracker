<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::post('/users', [UserController::class, 'store']);        
Route::get('/users/{user}', [UserController::class, 'show']);   

// Wallet Routes
Route::post('/users/{user}/wallets', [WalletController::class, 'store']);   
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);         

// Transaction Routes
Route::post('/wallets/{wallet}/transactions', [TransactionController::class, 'store']); 