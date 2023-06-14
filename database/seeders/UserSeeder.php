<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_user = File::get('database/datas/user.json');
        $users = json_decode($json_user);

        try {
            foreach ($users as $user) {
                $existingUser = User::where('email', $user->email)->first();
                if (!$existingUser) {
                    User::create([
                        'matricule' => $user->matricule,
                        'name' => $user->lastname . ' ' . $user->firstname,
                        'lastname' => $user->lastname,
                        'firstname' => $user->firstname,
                        'email' => $user->email,
                        'password' => Hash::make($user->password),
                    ]);
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
