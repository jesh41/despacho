<?php

use Illuminate\Database\Seeder;

class catsucursalseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ["Casa Matriz", "Santo Domingo", "Tiscapa"];
        for ($i = 0; $i < 3; $i++) {
            DB::table('catsucursal')->insert([
                'nombre' => $array[$i],
            ]);
        }
    }
}
