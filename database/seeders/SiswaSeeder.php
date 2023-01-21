<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 30; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('siswas')->insert([
                'nis' => rand(1, 100000),
                'nama' => $faker->name,
                'jk' => 'L',
                'alamat' => 'cicalengka',
                'kode_rombel' => 1,
                'email' => $faker->email,
                'tanggal_lahir' => date('Y-m-d'),
                'tahun_masuk' => '2022'
            ]);
        }
    }
}
