<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    // create a new wallet for specific user.

    public function store(Request $request, User $user): JsonResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'currency' => 'sometimes|string|size:3',   // optional, e.g. "USD", "KES"
        ]);

        $wallet = $user->wallets()->create($validated);

        return response()->json(new WalletResource($wallet), 201);
    }

    //  view a single wallet with its balance and all transactions.

    public function show(Wallet $wallet): JsonResponse
    {
        // Eager load transactions for balance calculation and response
        $wallet->load('transactions');

        return response()->json(new WalletResource($wallet));
    }
}
