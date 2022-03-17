<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'pizza',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'comidas rápidas',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'plomero',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'costura',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'tortas',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'helados',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'confección',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'shawarmas',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'maquillaje',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'pedicure',
        ]);

        \App\Models\Tag::create([
            'id' => Str::uuid(),
            'description' => 'manicure',
        ]);
    }
}
