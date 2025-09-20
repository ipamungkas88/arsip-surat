<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Arsip Model
 * 
 * Model untuk mengelola data arsip surat dalam sistem.
 * Menyimpan informasi dokumen PDF beserta metadata seperti nomor surat,
 * kategori, judul, dan waktu pengarsipan.
 * 
 * @package App\Models
 * @author Sistem Arsip Surat
 * @version 1.0
 * 
 * @property int $id ID unik arsip (auto increment)
 * @property string $nomor_surat Nomor unik surat (required, unique)
 * @property string $kategori Kategori surat dari master kategori (required)
 * @property string $judul Judul atau subjek surat (required)
 * @property string $file_path Path file PDF di storage (required)
 * @property \Carbon\Carbon $waktu_pengarsipan Timestamp pengarsipan dokumen
 * @property \Carbon\Carbon $created_at Timestamp pembuatan record
 * @property \Carbon\Carbon $updated_at Timestamp update terakhir
 */
class Arsip extends Model
{
    /**
     * Nama tabel database
     *
     * @var string
     */
    protected $table = 'arsip';
    
    /**
     * Kolom yang dapat diisi melalui mass assignment
     *
     * @var array<string>
     */
    protected $fillable = [
        'nomor_surat',      // Nomor unik surat
        'kategori',         // Kategori surat 
        'judul',           // Judul surat
        'file_path',       // Path file PDF
        'waktu_pengarsipan' // Waktu pengarsipan
    ];

    /**
     * Casting atribut ke tipe data tertentu
     *
     * @var array<string, string>
     */
    protected $casts = [
        'waktu_pengarsipan' => 'datetime' // Cast ke Carbon instance
    ];

    /**
     * Boot model untuk event handling
     * Bisa ditambahkan untuk auto-set waktu_pengarsipan saat create
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        
        // Event listener bisa ditambahkan di sini
        // static::creating(function ($arsip) {
        //     $arsip->waktu_pengarsipan = now();
        // });
    }
}
