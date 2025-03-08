<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MigratePasswordsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (!Hash::check($user->password, $user->password)) { // Jika password bukan Bcrypt
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }
    }
}