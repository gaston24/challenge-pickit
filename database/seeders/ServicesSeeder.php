<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $services = array(
            [
            'descripcion' => 'Cambio de Aceite',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Cambio de Filtro',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Cambio de Correa',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Revisión General',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Otro',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            
        );

        DB::table('services')->delete();
        DB::table('services')->insert($services);
    }
}
