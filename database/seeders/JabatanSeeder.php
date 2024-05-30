<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            'nama' => 'Kepala Perpustakaan',
        ]);

        DB::table('jabatan')->insert([
            'nama' => 'Sekretaris',
        ]); 

        DB::table('jabatan')->insert([
            'nama' => 'Bendahara',
        ]); 

        DB::table('jabatan')->insert([
            'nama' => 'Staf',
        ]); 

    }
}
