<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@larahub.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
