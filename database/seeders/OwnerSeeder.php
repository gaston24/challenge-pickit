<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        $owners = array(
            [
            'apellido' => 'Alvarez',
            'nombre' => 'Juan',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'apellido' => 'Gonzalez',
            'nombre' => 'Pedro',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'apellido' => 'Badia',
            'nombre' => 'Gonzalo',
            'created_at' => $now,
            'updated_at' => $now
            ], 
            [
            'apellido' => 'Gutierrez',
            'nombre' => 'Nicolas',
            'created_at' => $now,
            'updated_at' => $now
            ], 
        );

        DB::table('owners')->delete();
        DB::table('owners')->insert($owners);
    }
}
