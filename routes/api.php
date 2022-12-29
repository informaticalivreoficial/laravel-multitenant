<?php

use App\Http\Controllers\Api\{
    ImovelController,
    StripeController,
    TenantApiController
};

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1'
], function () {    
    
    /********************** Imóveis ************************************/
    Route::get('/imoveis/{id}', [ImovelController::class, 'show']);
    Route::get('/imoveis/empresa/{tenant}', [ImovelController::class, 'index']);

    /********************** Tenants ************************************/
    Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
    Route::get('/tenants', [TenantApiController::class, 'index']);
});