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
            'costo' => 1234,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Cambio de Filtro',
            'costo' => 2345,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Cambio de Correa',
            'costo' => 3456,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Revisión General',
            'costo' => 4567,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'descripcion' => 'Otro',
            'costo' => 1,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            
        );

        DB::table('services')->delete();
        DB::table('services')->insert($services);
    }
}
