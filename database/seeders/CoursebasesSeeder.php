<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CoursebasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $seedme = [
            ['Dynamika a riadenie procesov','N422D0_4I','10'],
            ['Informačné technológie I','N422I1_4I','11'],
            ['Informačné technológie II','N422I3_4I','11'],
            ['Informatizácia a priemyselné informačné systémy II','422I3_4I','12'],
            ['Linux -- základná automatizácia','N422L0_4B','11'],
            ['Modelovanie','N422M1_4B','10'],
            ['Modelovanie v procesnom priemysle','N422M0_4I','10'],
            ['Objektovo orientované programovanie','N422O0_4I','12'],
            ['Operačné systémy','N422O2_4B','13'],
            ['Optimalizácia','N422O3_4B','12'],
            ['Optimalizácia procesov a výrob','422O1_4I','12'],
            ['Priemyselné riadiace systémy','N422P3_4I','11'],
            ['Programovanie webových aplikácií','N422P0_4I','12'],
            ['Projektovanie informatizačných a riadiacich systémov','N422P1_4B','12']
        ];
        foreach ($seedme as $sd) {
            DB::table('coursebases')->insert([
                'name'=> $sd[0],
                'ais_id' => $sd[1],
                'def_guarantor' => $sd[2]
            ]);
        }
    }
}
