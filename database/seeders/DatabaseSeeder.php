<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FileType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FolderSeeder::class,
            ContactSeeder::class,
            FileTypeSeeder::class,
            // OperationSeeder::class,
            // PageSeeder::class,
        ]);
    }
}
