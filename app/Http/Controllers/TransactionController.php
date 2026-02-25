<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // add income or expense transaction to a wallet.

    public function store(Request $request, Wallet $wallet): JsonResponse
    {
        $validated = $request->validate([
            'type'        => 'required|in:income,expense',
            'amount'      => 'required|numeric|min:0.01',       // must be positive
            'description' => 'nullable|string|max:255',
        ]);

        $transaction = $wallet->transactions()->create($validated);

        return response()->json(new TransactionResource($transaction), 201);
    }
}
