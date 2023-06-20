<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingContact = Contact::where('email', 'Associationcardey@gmail.com')->first();
        if (!$existingContact) {
            Contact::create([
                'longitude' => "",
                'latitude' => "",
                'address' => "",
                'email' => "Associationcardey@gmail.com",
                'phone' => "+228 90 13 50 36",
                'resume' => "",
            ]);
        }
    }
}
