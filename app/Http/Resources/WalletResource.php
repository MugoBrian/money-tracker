<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'currency' => $this->currency,
            'balance' => $this->balance,              
            
            // Only include transactions when they've been loaded (i.e. wallet detail view)
            'transactions' => TransactionResource::collection(
                $this->whenLoaded('transactions')
            ),
        ];
    }
}
