<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        $cars = array(
            [
            'marca' => 'Fiat',
            'modelo' => 'Palio',
            'anio' => 2011,
            'patente' => 'JAH804',
            'color' => 'gris',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Ford',
            'modelo' => 'Focus',
            'anio' => 2018,
            'patente' => 'AA230OP',
            'color' => 'blanco',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Chevrolet',
            'modelo' => 'Spin',
            'anio' => 2019,
            'patente' => 'AB564UT',
            'color' => 'negro',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Volkswagen',
            'modelo' => 'Gol',
            'anio' => 2015,
            'patente' => 'OPT503',
            'color' => 'rojo',
            'created_at' => $now,
            'updated_at' => $now
            ], 
        );

        DB::table('cars')->delete();
        DB::table('cars')->insert($cars);
    }
}
