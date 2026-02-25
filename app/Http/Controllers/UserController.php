<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // create new user

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create($validated);

        return response()->json(new UserResource($user), 201);
    }

    // view a user's profile with all wallets and their balances.

    public function show(User $user): JsonResponse
    {
        // Eager load wallets and their transactions (needed for balance calculation)
        $user->load('wallets.transactions');

        return response()->json(new UserResource($user));
    }
}
