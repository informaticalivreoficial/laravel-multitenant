<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            [
                'plan_id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Admin',    
                'dominio' => 'sistemaimobiliario.info',
                'template' => 'superimoveis',
                //Endereço
                'cep' => '11680000',
                'rua' => 'Rua Primavera',
                'num' => '120',
                'bairro' => 'Jardim Carolina',
                'complemento' => 'casa',
                'uf' => '25',
                'cidade' => '5351',           
                'status' => 1
            ]            
        ]);
    }
}
