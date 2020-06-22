<?php

use Illuminate\Database\Seeder;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 20; $i++){
            DB::table('sintomas')->insert([
                'name' => $faker->lastName,
            ]);
        }
    }
}
