<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedme = ['Monika Bakosova', 'Miroslav Fikar', 'Michal Kvasnica', 'Richard Valo', 'Anna Vasickaninova', 'Lubos Cirka', 'Juraj Oravec'];
        foreach ($seedme as $sd) {
            DB::table('users')->insert([
                'name'=> $sd,
                'email' => Str::random(10).'@stuba.sk',
                'password' => Hash::make('Password'),
                'username' =>Str::random(10)
            ]);
        }

    }
}
