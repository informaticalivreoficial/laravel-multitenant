<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImovelResource;
use App\Services\ImovelService;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    protected $imovelService;

    public function __construct(ImovelService $imovelService)
    {
        $this->imovelService = $imovelService;
    }

    public function index(Request $request, $tenant)
    {
        $per_page = (int) $request->get('per_page', 15);

        $imoveis = $this->imovelService->getAllImoveisTenant($per_page, $tenant);
        
        return ImovelResource::collection($imoveis);
    }

    public function show($id)
    {
        if (!$imovel = $this->imovelService->getImovelById($id)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new ImovelResource($imovel);
    }
}
