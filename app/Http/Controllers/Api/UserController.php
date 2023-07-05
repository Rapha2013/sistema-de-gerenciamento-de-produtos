<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $productsArray = $user->with(['products' => function ($query) {
                                            $query->withoutGlobalScopes();
                                        }, 
                                        'products.category'
                                     ])
                              ->withoutGlobalScopes()
                              ->get();

        return UserResource::collection($productsArray)[0] ?? [];
    }
}
