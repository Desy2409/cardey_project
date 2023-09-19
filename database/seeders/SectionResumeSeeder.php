<?php

namespace Database\Seeders;

use App\Models\SectionResume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingSectionResume = SectionResume::first();
        if (!$existingSectionResume) {
            SectionResume::create([
                'home_first_title' => "L'équipe de CARDEY pour le Soutien des Orphelins, des enfants démunis et toutes personnes Vulnérables...",
                'home_second_title' => '',//"Phrase d'accroche n°2 de l'Association CARDEY",
                'gallery' => "",
                'team' => "",
                'faq' => "",
            ]);
        } 
    }
}
