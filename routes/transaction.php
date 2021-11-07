<?php

use App\Models\Users\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('transaction', [TransactionController::class, 'transaction']);
