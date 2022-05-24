<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeknisiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Teknisi::create([
            'name'    => 'teknisi',
            'email'    => 'teknisi123@gmail.com',
            'password'    => bcrypt('teknisi123')
    ]);    }
}
