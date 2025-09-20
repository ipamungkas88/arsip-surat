<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Surat Masuk',
            'keterangan' => 'Kategori untuk surat masuk ke kantor desa'
        ]);
        
        Category::create([
            'nama_kategori' => 'Surat Keluar',
            'keterangan' => 'Kategori untuk surat keluar dari kantor desa'
        ]);
        
        Category::create([
            'nama_kategori' => 'Surat Keputusan',
            'keterangan' => 'Kategori untuk surat keputusan kepala desa'
        ]);
    }
}
