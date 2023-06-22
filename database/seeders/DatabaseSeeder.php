<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FileType;
use App\Models\SectionResume;
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
            AboutSeeder::class,
            ContactSeeder::class,
            SectionResumeSeeder::class,
            FileTypeSeeder::class,
            // OperationSeeder::class,
            // PageSeeder::class,
        ]);
    }
}
