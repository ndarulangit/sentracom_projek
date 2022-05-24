<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'    => 'user',
            'email'    => 'user123@gmail.com',
            'password'    => bcrypt('user123')
    ]);    }
}
