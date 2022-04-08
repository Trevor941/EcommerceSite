<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'firstname' => 'Trevor',
            'lastname' => 'Tshuma',
            'email' => 'trey94kingz@gmail.com',
            'phone' => '0787549982',
            'password' => Hash::make('12345678')
        ]);

        $user2 = User::create([
            'firstname' => 'Trey',
            'lastname' => 'Tshuks',
            'email' => 'tr@gmail.com',
            'phone' => '0787549982',
            'password' => Hash::make('12345678')
        ]);
    }
}
