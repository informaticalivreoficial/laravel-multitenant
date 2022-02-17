<?php

use App\Http\Controllers\Api\{
    ImovelController,
    TenantApiController
};

Route::get('/imoveis', [ImovelController::class, 'index'])->name('index');
Route::get('/tenants', [TenantApiController::class, 'index'])->name('index');
