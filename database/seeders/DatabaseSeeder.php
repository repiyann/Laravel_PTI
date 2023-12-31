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
        // memanggil UserSeeder agar bisa migrate dan mengisi baris database dari UserSeeder
        $this->call(UserSeeder::class);
    }
}
