<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Models\Product;

class TransactionItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    //hasOne to rate
    public function rate()
    {
        return $this->hasOne(Rate::class);
    }

    //hasOne to Quality
    public function quality()
    {
        return $this->hasOne(Quality::class);
    }
}
