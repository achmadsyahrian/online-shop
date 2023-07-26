<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Outlet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'achrian',
            'name' => 'Achmad Syahrian',
            'password' => bcrypt('achrian123'),
            'role' => 'toko',
            'phone' => '0895423336075'
        ]);
        
        Outlet::create([
            'user_id' => 1,
            'name' => "Achmad.ID",
            'address' => "Washington, D.C., Amerika Serikat",
            'phone' => '089528126200',
            'description' => ""
        ]);

    }
}
