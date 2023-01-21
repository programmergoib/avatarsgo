<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $no = 3;
        for ($i = 1; $i <= 30; $i++) {
            $label = $no++;
            // insert data ke table pegawai menggunakan Faker
            DB::table('rombels')->insert([
                'tahun_pelajaran' => "2022/2023",
                'rombel' => "XII TKJ " . $label,
                'tahun_pelajaran' => "2022/2023",
                'tingkat' => "XII",
                'jurusan' => "Teknik Komputer Jaringan",
                'jumlah_siswa' => 33,
            ]);
        }
    }
}
