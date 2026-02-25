<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'  => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'total_balance' => $this->total_balance,  

            // Only include wallets when they've been loaded (i.e. wallet detail view)
            'wallets'  => WalletResource::collection(
                $this->whenLoaded('wallets')
            ),
        ];
    }
}
