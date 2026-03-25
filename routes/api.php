<?php

use App\Http\Controllers\Api\AuditLogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IpAddressController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/ips', [IpAddressController::class, 'index']);
    Route::post('/ips', [IpAddressController::class, 'store']);
    Route::get('/ips/{ipAddress}', [IpAddressController::class, 'show']);
    Route::put('/ips/{ipAddress}', [IpAddressController::class, 'update']);
    Route::delete('/ips/{ipAddress}', [IpAddressController::class, 'destroy']);

    Route::get('/audit-logs', [AuditLogController::class, 'index']);
});