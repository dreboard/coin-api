<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class TypeController extends Controller
{

    private $typeRepository;

    /**
     * Create a new controller instance.
     *
     * @param TypeRepository $typeRepository
     */
    public function __construct(TypeRepository $typeRepository)
    {
        //$this->middleware('auth');
        $this->typeRepository = $typeRepository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try{
            $typeInfo = $this->typeRepository->getType($request->id);
            $typeCoins = $this->typeRepository->getTypeCoins($request->id);
            $typeCount = count($typeCoins);
            $typeLink = str_replace(' ', '_', $typeInfo[0]->coinType);

            return response()->json([
                'typeInfo' => $typeInfo,
                'typeCoins' => $typeCoins,
                'typeLink' =>  $typeLink,
                'typeCount' =>  $typeCount,
            ], 200);

        }catch (Throwable $e){
            Log::error($e->getMessage().''.$e->getFile().''.$e->getLine());
            return response()->json([
                'error' => 'Type not found',
            ], 200);
        }

    }
}
