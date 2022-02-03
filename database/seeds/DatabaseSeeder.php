<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'name' => 'apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => bcrypt('apoteker321'),
            'role' => 'apoteker'
        ]);

        User::create([
            'name' => 'dokter',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('dokter123'),
            'role' => 'dokter'
        ]);
    }
}
