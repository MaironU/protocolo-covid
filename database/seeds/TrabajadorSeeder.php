<?php

use Illuminate\Database\Seeder;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            DB::table('trabajadors')->insert([
                'firstname' => $faker->name,
                'lastname' => $faker->lastName,
                'age' => rand(2, 3),
                'cc' => rand(29923883, 938783838),
                'email' => $faker->email,
                'password' => '123456',
                'empresa_id' => 22
            ]);
        }
    }
}
