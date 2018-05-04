<?php

use Illuminate\Database\Seeder;

class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carros')->insert([
            'modelo' => 'Sandero',
            'marca_id' => 3,
            'cor' => 'Azul',
            'ano' => 2015,
            'preco' => 27500,
            'combustivel' => 'G',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);

        DB::table('carros')->insert([
            'modelo' => 'Gol',
            'marca_id' => 5,
            'cor' => 'Branco',
            'ano' => 2013,
            'preco' => 19500,
            'combustivel' => 'A',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);

        DB::table('carros')->insert([
            'modelo' => 'Palio',
            'marca_id' => 4,
            'cor' => 'Vermelho',
            'ano' => 2016,
            'preco' => 29800,
            'combustivel' => 'F',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);

        DB::table('carros')->insert([
            'modelo' => 'Fiesta',
            'marca_id' => 1,
            'cor' => 'Preto',
            'ano' => 2017,
            'preco' => 34500,
            'combustivel' => 'G',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
        
    }
}
