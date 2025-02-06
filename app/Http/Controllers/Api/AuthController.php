<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    private $userModel = null;

    public function __construct() {
        $this->userModel = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request): \Illuminate\View\View
    {   
        $users = $this->userModel->getUsers();
        return view('components.usersList', compact('users'));
    }

    /**
     * Creates a new resource.
     */
    public function store(Request $request): JsonResponse
    {
        $user = $this->userModel->createUser($request->input('id_usuario'));
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): JsonResponse
    {
        $deleted = $this->userModel->deleteUser($id);
        return response()->json($deleted);
    }
}