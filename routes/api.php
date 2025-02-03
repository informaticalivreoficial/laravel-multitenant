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
    Route::get('/empresa/{id}/imoveis', [ImovelController::class, 'index']);
    Route::get('/empresa/{id}/imovel/destaque', [ImovelController::class, 'destaque']);

    /********************** Tenants ************************************/
    Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
    Route::get('/tenants', [TenantApiController::class, 'index']);
});