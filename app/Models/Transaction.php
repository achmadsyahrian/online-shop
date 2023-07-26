<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionItem;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transactionItems() 
    {
        return $this->hasMany(Transaction::class);
    }
    
}