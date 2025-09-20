@extends('layouts.app')

@section('title', 'Arsip Surat - Desa Karangduren')

@section('content')
  <div class="max-w-7xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="breadcrumb">
      <ol class="flex space-x-2 text-sm text-gray-600">
        <li class="font-medium text-gray-900">Arsip Surat</li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Arsip Surat</h2>

    <div class="mb-6 space-y-2">
      <p class="text-gray-600">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
      <p class="text-gray-600">Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
    </div>

    <!-- Search Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
      <form method="GET" action="{{ route('arsip.index') }}" class="flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-96">
          <label for="search" class="block text-base font-medium text-gray-700 mb-3">
            <i class="fas fa-search mr-2"></i>Cari surat:
          </label>
          <input type="text" class="form-input text-base py-3 px-4" id="search" name="search"
            value="{{ request('search') }}" placeholder="Masukkan judul surat...">
        </div>
        <div>
          <button type="submit" class="btn-primary py-3 px-6 text-base">
            <i class="fas fa-search mr-2"></i>Cari
          </button>
        </div>
      </form>
    </div>

    <!-- Archive Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="table-header">Nomor Surat</th>
              <th class="table-header">Kategori</th>
              <th class="table-header">Judul</th>
              <th class="table-header">Waktu Pengarsipan</th>
              <th class="table-header">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($arsipList as $arsip)
              <tr class="hover:bg-gray-50">
                <td class="table-cell">{{ $arsip->nomor_surat }}</td>
                <td class="table-cell">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $arsip->kategori }}
                  </span>
                </td>
                <td class="table-cell">{{ $arsip->judul }}</td>
                <td class="table-cell">{{ $arsip->waktu_pengarsipan->format('Y-m-d H:i') }}</td>
                <td class="table-cell">
                  <div class="flex items-center space-x-2">
                    <button class="btn-danger text-xs px-3 py-1" data-id="{{ $arsip->id }}"
                      onclick="confirmDeleteArsip(this)">
                      <i class="fas fa-trash mr-1"></i>Hapus
                    </button>
                    <a href="{{ route('arsip.download', $arsip->id) }}"
                      class="btn-warning text-xs px-3 py-1">
                      <i class="fas fa-download mr-1"></i>Unduh
                    </a>
                    <a href="{{ route('arsip.edit', $arsip->id) }}"
                      class="btn-secondary text-xs px-3 py-1">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <a href="{{ route('arsip.show', $arsip->id) }}"
                      class="btn-primary text-xs px-3 py-1">
                      <i class="fas fa-eye mr-1"></i>Lihat
                    </a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                  <div class="flex flex-col items-center">
                    <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                    <p class="text-lg">Tidak ada data surat yang diarsipkan.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Archive Button -->
    <div class="mt-6">
      <a href="{{ route('arsip.create') }}" class="btn-success">
        <i class="fas fa-plus mr-2"></i>Arsipkan Surat Baru
      </a>
    </div>
  </div>

  <!-- Delete Form (Hidden) -->
  <form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
  </form>
@endsection
