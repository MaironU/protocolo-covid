<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => 'inspector urieles',
            'email' =>'inspector@gmail.com',
            'password' => Hash::make('123456'),
            'empresa_id' => 1
        ]);
    }
}
