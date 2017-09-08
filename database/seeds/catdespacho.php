<?php

use Illuminate\Database\Seeder;

class catdespacho extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ["PENDIENTE", "ENTREGADO"];
        for ($i = 0; $i < 2; $i++) {
            DB::table('CatEstDespacho')->insert([
                'id'=>$i+1,
                'estado' => $array[$i],
            ]);
        }
    }
}
