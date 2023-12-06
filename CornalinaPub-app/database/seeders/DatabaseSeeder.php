<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Empresa::factory(50)->create();
        \App\Models\Evento::factory(50)->create();
        \App\Models\LoteIngresso::factory(10)->create();
    }
}