@extends('layouts.app')

@section('title', 'Edit Arsip Surat')

@section('content')
  <div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="breadcrumb">
      <ol class="flex space-x-2 text-sm text-gray-600">
        <li>
          <a href="{{ route('arsip.index') }}"
            class="text-primary-600 hover:text-primary-700 hover:underline">
            Arsip Surat
          </a>
        </li>
        <li class="before:content-['/'] before:mr-2 before:text-gray-400 font-medium text-gray-900">
          Edit - {{ $arsip->nomor_surat }}
        </li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Edit Arsip: {{ $arsip->nomor_surat }}</h2>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
      <div class="mb-6 space-y-2">
        <p class="text-gray-600">Edit data arsip surat. File surat saat ini: <strong
            class="text-gray-900">{{ basename($arsip->file_path) }}</strong></p>
        <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
          <p class="text-sm font-medium text-blue-900 mb-2">Catatan:</p>
          <ul class="text-sm text-blue-800 space-y-1">
            <li class="flex items-start">
              <i class="fas fa-file-upload mr-2 text-blue-600 mt-0.5"></i>
              Isi file baru jika ingin mengganti file yang sudah ada
            </li>
            <li class="flex items-start">
              <i class="fas fa-times mr-2 text-blue-600 mt-0.5"></i>
              Kosongkan file jika hanya ingin mengubah data tanpa mengganti file
            </li>
            <li class="flex items-start">
              <i class="fas fa-file-pdf mr-2 text-red-500 mt-0.5"></i>
              Gunakan file berformat PDF
            </li>
          </ul>
        </div>
      </div>

      <form method="POST" action="{{ route('arsip.update', $arsip->id) }}"
        enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- ID Arsip -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="id_arsip" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            ID Arsip
          </label>
          <div class="md:col-span-3">
            <input type="text" class="form-input text-base py-3 px-4 bg-gray-50 cursor-not-allowed"
              id="id_arsip" name="id_arsip" value="{{ $arsip->id }}" readonly>
            <p class="mt-1 text-sm text-gray-500">ID arsip tidak dapat diubah</p>
          </div>
        </div>

        <!-- Nomor Surat -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="nomor_surat" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            Nomor Surat
          </label>
          <div class="md:col-span-3">
            <input type="text"
              class="form-input text-base py-3 px-4 @error('nomor_surat') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              id="nomor_surat" name="nomor_surat"
              value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
            @error('nomor_surat')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="kategori" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            Kategori <span class="text-red-500">*</span>
          </label>
          <div class="md:col-span-3">
            <select name="kategori" id="kategori" required
              class="form-input text-base py-3 px-4 @error('kategori') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
              <option value="">-- Pilih Kategori --</option>
              @foreach ($categories as $category)
                <option value="{{ $category->nama_kategori }}"
                  {{ old('kategori', $arsip->kategori) == $category->nama_kategori ? 'selected' : '' }}>
                  {{ $category->nama_kategori }}
                </option>
              @endforeach
            </select>
            @error('kategori')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Judul -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="judul" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            Judul
          </label>
          <div class="md:col-span-3">
            <input type="text"
              class="form-input text-base py-3 px-4 @error('judul') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              id="judul" name="judul" value="{{ old('judul', $arsip->judul) }}" required>
            @error('judul')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- File Saat Ini -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="current_file" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            File Saat Ini
          </label>
          <div class="md:col-span-3 space-y-2">
            <div class="flex">
              <input type="text"
                class="form-input text-base py-3 px-4 rounded-r-none border-r-0 bg-gray-50" readonly
                value="{{ basename($arsip->file_path) }}">
              <a href="{{ route('arsip.download', $arsip->id) }}"
                class="btn-primary text-base py-3 px-4 rounded-l-none border-l-0 border-l-gray-300">
                <i class="fas fa-download mr-2"></i>Download
              </a>
            </div>
            <p class="text-sm text-gray-500">File yang sedang digunakan</p>
          </div>
        </div>

        <!-- File Baru -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="file" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            File Baru (Opsional)
          </label>
          <div class="md:col-span-3 space-y-2">
            <div class="flex">
              <input type="text" class="form-input text-base py-3 px-4 rounded-r-none border-r-0"
                id="file-display" readonly placeholder="Pilih file baru jika ingin mengganti">
              <button type="button"
                class="btn-secondary text-base py-3 px-4 rounded-l-none border-l-0 border-l-gray-300"
                onclick="document.getElementById('file').click()">
                <i class="fas fa-folder-open mr-2"></i>Browse...
              </button>
            </div>
            <input type="file" class="hidden @error('file') border-red-500 @enderror"
              id="file" name="file" accept=".pdf">
            @error('file')
              <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div class="md:col-start-2 md:col-span-3">
            <div class="flex space-x-4">
              <a href="{{ route('arsip.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
              </a>
              <button type="submit" class="btn-primary">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('file').addEventListener('change', function(e) {
      const fileName = e.target.files[0] ? e.target.files[0].name :
        'Pilih file baru jika ingin mengganti';
      document.getElementById('file-display').value = fileName;
    });
  </script>

@endsection
