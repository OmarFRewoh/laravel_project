<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\View\View;

class HousesController extends Controller
{
    private $houseModel = null;

    public function __construct() {
        $this->houseModel = new House();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function show(): View
    {   
        return view('home');
    }
}
