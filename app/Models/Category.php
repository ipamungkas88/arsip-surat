<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Category Model
 * 
 * Model untuk mengelola master data kategori surat.
 * Digunakan untuk dropdown dinamis pada form input arsip
 * dan validasi kategori yang tersedia dalam sistem.
 * 
 * @package App\Models
 * @author Sistem Arsip Surat
 * @version 1.0
 * 
 * @property int $id ID unik kategori (auto increment)
 * @property string $nama_kategori Nama kategori surat (required, unique)
 * @property string|null $keterangan Deskripsi atau keterangan kategori (optional)
 * @property \Carbon\Carbon $created_at Timestamp pembuatan record
 * @property \Carbon\Carbon $updated_at Timestamp update terakhir
 */
class Category extends Model
{
    /**
     * Kolom yang dapat diisi melalui mass assignment
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama_kategori',    // Nama kategori (unik)
        'keterangan'        // Deskripsi kategori (opsional)
    ];

    /**
     * Scope untuk mencari kategori berdasarkan nama
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $nama
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByNama($query, $nama)
    {
        return $query->where('nama_kategori', $nama);
    }

    /**
     * Mendapatkan daftar nama kategori untuk dropdown
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getDropdownOptions()
    {
        return static::pluck('nama_kategori', 'nama_kategori');
    }

    /**
     * Mendapatkan array nama kategori untuk validasi
     *
     * @return array<string>
     */
    public static function getValidationList()
    {
        return static::pluck('nama_kategori')->toArray();
    }
}
