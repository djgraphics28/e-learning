<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => '$2y$12$t7.ZuNE42DejDAQ9HhqlaexRycEpygqjHc.RPohPv50eKLneE985W',
            'user_type' => '1',
            'user_id' => '0'
        ]);
    }
}
