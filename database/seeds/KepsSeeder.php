<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keps')->insert([
            'nm_kep' => 'Mutlak Lebih Penting',
            'angka' => 9.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Mendekati Mutlak Lebih Penting',
            'angka' => 8.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Sangat Lebih Penting',
            'angka' => 7.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Mendekati Sangat Lebih Penting',
            'angka' => 6.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Lebih Penting',
            'angka' => 5.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Mendekati Lebih Penting',
            'angka' => 4.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Cukup Penting',
            'angka' => 3.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Mendekati Cukup Penting',
            'angka' => 2.0,
        ]);
        DB::table('keps')->insert([
            'nm_kep' => 'Sama Penting',
            'angka' => 1.0,
        ]);
        //
    }
}
