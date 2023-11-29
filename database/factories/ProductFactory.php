<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'nama_produk' => fake()->unique()->randomElement([
                'Gasoline','Diesel','Petrolium','Nafta','Kerosin'
            ]),
            'stok' => rand(1,1000),
            'harga' => fake()->numberBetween(100, 1000),
            'keterangan' => fake()->text()
        ];
    }
}
