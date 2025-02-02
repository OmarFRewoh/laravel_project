<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\House;

class HousesController extends Controller
{
    private $houseModel = null;

    public function __construct() {
        $this->houseModel = new House();
    }
    /**
     * Display a listing of the resource.
     */
    public function show($id = null): JsonResponse
    {   
        $houses = $this->houseModel->getHouses($id);
        return response()->json($houses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): JsonResponse
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
