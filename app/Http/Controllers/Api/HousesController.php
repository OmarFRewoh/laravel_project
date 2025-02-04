<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\House;
use App\Services\House as HouseLib;

class HousesController extends Controller
{
    private $houseModel = null;
    
    private $houseLib = null;

    public function __construct() {
        $this->houseModel = new House();
        $this->houseLib = new HouseLib();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function show($id = null): JsonResponse
    {   
        $houses = $id 
            ? $this->houseModel->getHouse($id)
            : $this->houseModel->getHouses();
        return response()->json($houses);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {   
        $filters = $this->houseLib->cleanSearchFilters($request->all());
        $houses = $this->houseModel->searchHouse($filters);
        return view('components.housesList', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request): JsonResponse
    {
        $house = $this->houseModel->createHouse($request->all());
        return response()->json($house);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): bool
    {
        $deleted = $this->houseModel->deleteHouse($id);
        return response()->json($deleted);
    }
}
