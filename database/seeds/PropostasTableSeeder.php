<?php

use Illuminate\Database\Seeder;

class PropostasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propostas')->insert([
            'nome_cliente' => 'Sandro Azul',
            'email' => 'tt@teste.com',
            'telefone' => '9849099922',
            'proposta' => 23900,
            'carro_id' =>  '1',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')            
        ]);
    }
}
