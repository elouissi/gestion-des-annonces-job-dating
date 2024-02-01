<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Compagnie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('compagnies')->insert([
            'name' => 'youcode',
            'address' => 'jlijdzie',
            'contact' => 'mlkm',
            'field_of_activity' => 'jlijdzie',
        ]);
        
        Compagnie::factory()->create();
    }
}
