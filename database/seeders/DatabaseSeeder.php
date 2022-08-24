<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_as' => 1
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role_as' => 0
        ]);
        
        $this->call(BookSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(UserSeeder::class);
    }
}
