<?php

namespace App\Http\Controllers;

use App\Helpers\CoinHelper;
use Facades\App\Repositories\CoinVarietyRepository;
use App\Repositories\CollectedRepository;
use Facades\App\Repositories\CoinRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CoinVarietyController extends Controller
{

    /**
     * @var CollectedRepository
     */
    private CollectedRepository $collectedRepository;

    public function __construct()
    {
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVarietyByID(Request $request)
    {
        try{
            $coin['info'] = CoinVarietyRepository::coinVarietyGetByID($request->variety_id);
            $coin['placeHolderNumber'] = 1;
            $coin['collected'] = CoinHelper::collected();  //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            $coin['typeLink'] = str_replace(' ', '_', $coin['info'][0]->coinType);
            //dd($coin);
            return response()->json([
                'coin' => $coin
            ], 200);
        }catch (Throwable $e){
            Log::error($e->getMessage().''.$e->getFile().''.$e->getLine());
            return response()->json([
                'error' => 'Variety not found by ID',
            ], 200);
        }
    }


    /**
     * Get all of a variety by coin id.
     * @example (all 1909P Doubled Die Reverse coins)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVarietyByName(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $varietyList = CoinVarietyRepository::getVarietyByType($request->coin_id, $request->variety);
            $coin = CoinRepository::getIndexPageArray($request->coin_id);
            $collected = CollectedRepository::collected(); //$this->collectedRepository->collectionGetCoinsByID($id, Auth::id());
            return response()->json([
                'coin' => $coin,
                'variety' => $request->variety,
                'varietyList' =>  $varietyList,
                'collected' => $collected
            ], 200);

        }catch (Throwable $e){
            Log::error($e->getMessage().''.$e->getFile().''.$e->getLine());
            return response()->json([
                'error' => 'Variety type not found',
            ], 200);
        }
    }
}
