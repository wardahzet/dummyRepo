<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
    ];

    public function sale(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    // Define relationships if needed
}