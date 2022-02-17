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

    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 15);

        $imoveis = $this->imovelService->getAllImoveis($per_page);

        return ImovelResource::collection($imoveis);
    }
}
