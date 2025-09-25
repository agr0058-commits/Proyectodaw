<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientApiController;
use App\Http\Controllers\Api\IncidentApiController;
use App\Http\Controllers\Api\InvoiceApiController;

Route::middleware('auth')->group(function () {
    Route::apiResource('clients', ClientApiController::class);
    Route::apiResource('incidents', IncidentApiController::class);
    Route::apiResource('invoices', InvoiceApiController::class);
});


