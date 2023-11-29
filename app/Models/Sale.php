<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Distributor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'tanggal_pemesanan',
        'jumlah',
        'produk_id',
        'distributor_id',
    ];

    public function distributor(): BelongsTo
    {
        return $this->belongsTo(Distributor::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Define relationships if needed
}