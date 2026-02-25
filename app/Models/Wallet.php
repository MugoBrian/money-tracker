<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'currency'];

    // A wallet belongs to a user

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A wallet has many transactions

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    // Calculate wallet balance: total income - total expenses

    public function getBalance(): float
    {
        $income = $this->transactions->where('type', 'income')->sum('amount');
        $expense = $this->transactions->where('type', 'expense')->sum('amount');

        return $income - $expense;
    }
}
