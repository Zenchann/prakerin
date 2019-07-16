<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Candra',
            'email' => 'candra@gmail.com',
            'password' => bcrypt('rahasia')
        ]);
    }
}
