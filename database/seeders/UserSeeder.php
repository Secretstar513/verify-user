<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        for ($i = 0; $i < 100000; $i++) {
            $users[] = [
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'verified' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert users in chunks for better performance
        foreach (array_chunk($users, 1000) as $chunk) {
            DB::table('users')->insert($chunk);
        }
    }
}
