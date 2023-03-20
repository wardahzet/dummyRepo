<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'gleason',
            'password' => Hash::make('gleasonxx'),
            'name' => 'Robert Gleason',
            'level' => 0,
            'address' => 'aaa',
            'contact' => '08123',
            'bank_id' => '983',
            'gender'=> 'L',
            'status' => 'active',
            'contract_duration' => '3 months'
        ]);
    }
}
