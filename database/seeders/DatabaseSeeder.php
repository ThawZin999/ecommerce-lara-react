<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        User::create([
            'name' => 'userone',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('password')
        ]);

        Admin::create([
            'name' => 'adminone',
            'email' => 'adminone@gmail.com',
            'password' => Hash::make('password')
        ]);

        $supplier = ['Hana','MMK'];
        foreach ($supplier as $s) {

            Supplier::create([
                'name' => $s,
                'slug' => Str::slug($s)
            ]);
        }


        $category = ['Tshirt', 'Hat', 'Electronic', 'Mobile', 'Earphone'];
        foreach ($category as $c) {
            Category::create([
                'slug'=>Str::slug($c),
                'name'=>$c
            ]);
        }

        $brand = ['Samsung', 'Huawei', 'Apple'];
        foreach ($brand as $c) {
           Brand::create([
                'slug'=>Str::slug($c),
                'name'=>$c
            ]);
        }

        $color = ['Red', 'Green', 'Blue', 'Black', 'White'];
        foreach ($color as $c) {
            Color::create([
                'slug'=>Str::slug($c),
                'name'=>$c
            ]);
        }
    }
}
