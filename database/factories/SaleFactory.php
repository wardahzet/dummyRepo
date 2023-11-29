<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    
    protected $model = Sale::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_pemesanan' => fake()->dateTimeBetween('-2 years', 'now'),
            'jumlah' => rand(1,100),
            'distributor_id' => rand(1,10),
            'product_id' => rand(1,5),
        ];
    }
}
