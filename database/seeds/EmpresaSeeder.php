<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'name' => 'Doctor medasculo moreno',
            'descripcion' => 'Esta es la empresa doctor medasculo moreno',
        ]);
    }
}
