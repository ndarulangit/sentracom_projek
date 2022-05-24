<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name'    => 'admin',
            'email'    => 'admin123@gmail.com',
            'password'    => bcrypt('admin123')
    ]);    }
}
