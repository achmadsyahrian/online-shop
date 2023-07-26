<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi TB
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    // hapus atau nullable fied cattegory_id pada product jika cattegory dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($category) {
            $category->product()->update(['category_id' => null]);
        });
    }
    
}
