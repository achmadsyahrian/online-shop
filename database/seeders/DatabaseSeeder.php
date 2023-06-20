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

        User::factory(3)->create();
        
        Outlet::create([
            'user_id' => 1,
            'name' => "chmad.ID",
            'address' => "Washington, D.C., Amerika Serikat",
            'phone' => '089528126200',
            'description' => "-"
        ]);
        
        Category::create([
            'name' => "Kaos"
        ]);
        Category::create([
            'name' => "Kemeja"
        ]);
        Category::create([
            'name' => "Jaket"
        ]);

        Product::factory(15)->create();
    }
}
