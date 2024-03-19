<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BpjsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bpjs')->insert([
            'no_bpjs' => '0091111122',
            'norm' => '001',
            'nik_ktp' => '09876543212345678',
            'nama' => 'adi',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '1995-08-15', 
            'alamat' => 'jakarta',
        ]);
    }
}
