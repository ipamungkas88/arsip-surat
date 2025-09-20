<?php

namespace Database\Seeders;

use App\Models\Arsip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Arsip::create([
            'nomor_surat' => '2022/PD3/TU/001',
            'kategori' => 'Nota Dinas',
            'judul' => 'Nota Dinas WFH',
            'file_path' => 'arsip/sample.pdf',
            'waktu_pengarsipan' => Carbon::parse('2023-06-21 17:23:00')
        ]);

        Arsip::create([
            'nomor_surat' => '2022/PD2/TU/022',
            'kategori' => 'Undangan',
            'judul' => 'Undangan Halal Bi Halal',
            'file_path' => 'arsip/sample2.pdf',
            'waktu_pengarsipan' => Carbon::parse('2023-04-21 18:23:00')
        ]);
    }
}
