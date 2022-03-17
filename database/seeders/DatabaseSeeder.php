<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'id' => Str::uuid(),
            'name' => 'System Admin',
            'email' => 'systemadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        $this->call([
            CiudadesSeeder::class,
            TagSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
