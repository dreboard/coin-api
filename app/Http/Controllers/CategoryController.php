<?php

namespace App\Http\Controllers;

use App\Helpers\CoinHelper;
use Facades\App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Create Category home page data
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try{
            $category = CategoryRepository::getById($request->id);
            $types = CategoryRepository::getTypeAllCache($request->id);

            return response()->json([
                'types' => $types,
                'category' => $category
            ], 200);
        }catch (Throwable $e){
            Log::error($e->getMessage().''.$e->getFile().''.$e->getLine());
            return response()->json([
                'error' => 'Category not found',
            ], 200);
        }
    }
}
