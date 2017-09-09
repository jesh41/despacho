<?php

use Illuminate\Database\Seeder;

class catestadoseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ["A", "N", "U"];
        $array2 = ["APLICADO", "NO APLICADO", "ANULADO"];
        for ($i = 0; $i < 3; $i++) {
            DB::table('CatEstadoFact')->insert([
                'CodEstado' => $array[$i],
                'DesEstado'=>$array2[$i],
            ]);
        }
    }
}
