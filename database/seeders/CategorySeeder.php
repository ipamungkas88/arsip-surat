<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Pengumuman',
            'keterangan' => 'Surat-surat yang terkait dengan pengumuman'
        ]);

        Category::create([
            'nama_kategori' => 'Undangan',
            'keterangan' => 'Undangan rapat, koordinasi, dlsb.'
        ]);

        Category::create([
            'nama_kategori' => 'Nota Dinas',
            'keterangan' => 'Nota dinas internal dan eksternal'
        ]);

        Category::create([
            'nama_kategori' => 'Pemberitahuan',
            'keterangan' => 'Surat pemberitahuan resmi'
        ]);
    }
}
