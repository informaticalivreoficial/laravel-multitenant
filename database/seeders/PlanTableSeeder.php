<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'name' => 'Plano Grátis', 
                'slug' => 'plano-gratis',
                'stripe_id' => '1',
                'status' => true
            ]            
        ]);
    }
}
