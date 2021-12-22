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
            'owner_id' => 1,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Ford',
            'modelo' => 'Focus',
            'anio' => 2018,
            'patente' => 'AA230OP',
            'color' => 'blanco',
            'owner_id' => 2,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Chevrolet',
            'modelo' => 'Spin',
            'anio' => 2019,
            'patente' => 'AB564UT',
            'color' => 'negro',
            'owner_id' => 3,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Volkswagen',
            'modelo' => 'Gol',
            'anio' => 2015,
            'patente' => 'OPT503',
            'color' => 'rojo',
            'owner_id' => 4,
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'marca' => 'Volkswagen',
            'modelo' => 'Suran',
            'anio' => 2020,
            'patente' => 'AD506SD',
            'color' => 'verde',
            'owner_id' => 4,
            'created_at' => $now,
            'updated_at' => $now
            ], 
        );

        DB::table('cars')->delete();
        DB::table('cars')->insert($cars);
    }
}
