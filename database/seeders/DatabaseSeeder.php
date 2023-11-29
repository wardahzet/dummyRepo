<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sale;
use App\Models\Distributor;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory()->count(5)->create();
        Distributor::factory()->count(10)->create();
        Sale::factory()->count(rand(1000,1500))->create();

        // \App\Models\User::factory(10)->create();
        // $this->call(
        //     UserSeeder::class
        // );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
