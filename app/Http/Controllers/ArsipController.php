<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/**
 * ArsipController
 * 
 * Controller untuk mengelola operasi CRUD arsip surat.
 * Menangani upload file PDF, validasi data, dan manajemen file storage.
 * 
 * @package App\Http\Controllers
 * @author Sistem Arsip Surat
 * @version 1.0
 */
class ArsipController extends Controller
{
    /**
     * Menampilkan daftar semua arsip dengan fitur pencarian
     * 
     * @param \Illuminate\Http\Request $request Request object dengan parameter search
     * @return \Illuminate\View\View View arsip.index dengan daftar arsip
     */
    /**
     * Menampilkan daftar semua arsip dengan fitur pencarian
     * 
     * @param \Illuminate\Http\Request $request Request object dengan parameter search
     * @return \Illuminate\View\View View arsip.index dengan daftar arsip
     */
    public function index(Request $request)
    {
        // Query arsip terurut berdasarkan waktu pengarsipan terbaru
        $query = Arsip::orderBy('waktu_pengarsipan', 'desc');
        
        // Filter pencarian berdasarkan judul jika ada parameter search
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        
        // Eksekusi query dan ambil semua hasil
        $arsipList = $query->get();
        
        return view('arsip.index', compact('arsipList'));
    }

    /**
     * Menampilkan form untuk membuat arsip baru
     * 
     * @return \Illuminate\View\View View arsip.create dengan data kategori
     */
    public function create()
    {
        // Ambil semua kategori dari database untuk dropdown
        $categories = \App\Models\Category::all();
        return view('arsip.create', compact('categories'));
    }

    /**
     * Menyimpan arsip baru ke database dengan file upload
     * 
     * @param \Illuminate\Http\Request $request Request object dengan data form
     * @return \Illuminate\Http\RedirectResponse Redirect ke index dengan pesan sukses/error
     */
    public function store(Request $request)
    {
        $categories = \App\Models\Category::pluck('nama_kategori')->toArray();
        $categoryList = implode(',', $categories);
        
        $request->validate([
            'nomor_surat' => 'required|unique:arsip,nomor_surat',
            'kategori' => 'required|in:' . $categoryList,
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:10240' // 10MB max
        ], [
            'kategori.in' => 'Kategori yang dipilih tidak valid.',
            'file.max' => 'File tidak boleh lebih dari 10MB. Silakan kompres file PDF Anda terlebih dahulu.',
            'file.mimes' => 'File harus berformat PDF.',
            'file.required' => 'File PDF wajib dipilih.'
        ]);

        try {
            $file = $request->file('file');
            
            if (!$file || !$file->isValid()) {
                $errorMessage = 'File gagal diupload. ';
                if ($file) {
                    switch($file->getError()) {
                        case UPLOAD_ERR_INI_SIZE:
                            $errorMessage .= 'File melebihi batas maksimal server.';
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $errorMessage .= 'File melebihi batas maksimal form.';
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $errorMessage .= 'File hanya terupload sebagian.';
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $errorMessage .= 'Tidak ada file yang dipilih.';
                            break;
                        default:
                            $errorMessage .= 'Pastikan file tidak corrupt dan berformat PDF.';
                    }
                } else {
                    $errorMessage .= 'Tidak ada file yang diterima server.';
                }
                
                return redirect()->back()
                    ->withInput()
                    ->with('error', $errorMessage);
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('arsip', $fileName, 'public');

            if (!$filePath) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gagal menyimpan file. Periksa permission folder storage.');
            }

            Arsip::create([
                'nomor_surat' => $request->nomor_surat,
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'file_path' => $filePath,
                'waktu_pengarsipan' => Carbon::now()
            ]);

            return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('arsip.edit', compact('arsip', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);
        $categories = \App\Models\Category::pluck('nama_kategori')->toArray();
        $categoryList = implode(',', $categories);
        
        $request->validate([
            'nomor_surat' => 'required|unique:arsip,nomor_surat,' . $id,
            'kategori' => 'required|in:' . $categoryList,
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf|max:10240' // File optional untuk update
        ], [
            'kategori.in' => 'Kategori yang dipilih tidak valid.',
            'file.max' => 'File tidak boleh lebih dari 10MB. Silakan kompres file PDF Anda terlebih dahulu.',
            'file.mimes' => 'File harus berformat PDF.',
        ]);

        $updateData = [
            'nomor_surat' => $request->nomor_surat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
        ];

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($arsip->file_path)) {
                Storage::disk('public')->delete($arsip->file_path);
            }
            
            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('arsip', $fileName, 'public');
            $updateData['file_path'] = $filePath;
        }

        $arsip->update($updateData);

        return redirect()->route('arsip.index')->with('success', 'Data arsip berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        
        // Hapus file dari storage
        if (Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }
        
        $arsip->delete();
        
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil dihapus!');
    }

    public function download($id)
    {
        $arsip = Arsip::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->file_path);
        
        if (file_exists($filePath)) {
            return response()->download($filePath, $arsip->nomor_surat . '.pdf');
        }
        
        return redirect()->back()->with('error', 'File tidak ditemukan!');
    }

    public function about()
    {
        return view('arsip.about');
    }
}