<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingAbout = About::first();
        if (!$existingAbout) {
            About::create([
                'about_section_1' => "",
                'about_section_2' => "",
                'twitter' => "",
                'facebook' => "https://www.facebook.com/profile.php?id=100079122055205&mibextid=ZbWKwL",
                'instagram' => "https://instagram.com/associationcardey?igshid=NTc4MTIwNjQ2YQ==",
                'skype' => "",
                'linkedin' => "",
                'whatsapp' => "",
            ]);
        } 
    }
}
