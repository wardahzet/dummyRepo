<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
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