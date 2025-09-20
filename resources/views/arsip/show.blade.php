@extends('layouts.app')

@section('title', 'Arsip Surat >> Lihat')

@section('content')
  <div class="max-w-6xl mx-auto">
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
          Lihat - {{ $arsip->nomor_surat }}
        </li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Detail Arsip: {{ $arsip->nomor_surat }}</h2>

    <!-- Document Info -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <div class="mb-4">
            <label class="text-sm font-medium text-gray-500">Nomor Surat</label>
            <p class="text-lg text-gray-900">{{ $arsip->nomor_surat }}</p>
          </div>
          <div class="mb-4">
            <label class="text-sm font-medium text-gray-500">Kategori</label>
            <p class="text-lg">
              <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                {{ $arsip->kategori }}
              </span>
            </p>
          </div>
        </div>
        <div>
          <div class="mb-4">
            <label class="text-sm font-medium text-gray-500">Judul</label>
            <p class="text-lg text-gray-900">{{ $arsip->judul }}</p>
          </div>
          <div class="mb-4">
            <label class="text-sm font-medium text-gray-500">Waktu Unggah</label>
            <p class="text-lg text-gray-900">{{ $arsip->waktu_pengarsipan->format('Y-m-d H:i') }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- PDF Viewer -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
      <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Preview Dokumen</h3>
      </div>
      <div class="h-96 md:h-screen bg-gray-100">
        <iframe src="{{ asset('storage/' . $arsip->file_path) }}" class="w-full h-full border-0">
          <div class="flex items-center justify-center h-full">
            <div class="text-center p-8">
              <div class="mb-4">
                <i class="fas fa-file-pdf text-6xl text-red-500"></i>
              </div>
              <h5 class="text-xl font-semibold text-gray-900 mb-2">{{ strtoupper($arsip->kategori) }}
              </h5>
              <h6 class="text-lg text-gray-700 mb-4">{{ $arsip->nomor_surat }}</h6>
              <p class="text-gray-600 mb-4">Browser Anda tidak mendukung PDF viewer.</p>
              <a href="{{ route('arsip.download', $arsip->id) }}" class="btn-primary">
                <i class="fas fa-download mr-2"></i>Download PDF
              </a>
            </div>
          </div>
        </iframe>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-wrap gap-3">
      <a href="{{ route('arsip.index') }}" class="btn-secondary">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
      </a>
      <a href="{{ route('arsip.download', $arsip->id) }}" class="btn-primary">
        <i class="fas fa-download mr-2"></i>Unduh
      </a>
      <button class="btn-warning" data-id="{{ $arsip->id }}" onclick="confirmEditArsip(this)">
        <i class="fas fa-edit mr-2"></i>Edit/Ganti File
      </button>
    </div>
  </div>
  </div>

  <!-- Delete Form (Hidden) -->
  <form id="delete-form" method="POST" action="{{ route('arsip.destroy', $arsip->id) }}"
    style="display: none;">
    @csrf
    @method('DELETE')
  </form>

  <script>
    function confirmEditArsip(button) {
      const arsipId = button.getAttribute('data-id');
      window.location.href = `/arsip/${arsipId}/edit`;
    }
  </script>

@endsection
