@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
  <div class="max-w-7xl mx-auto">
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
          Kategori Surat
        </li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Kategori Surat</h2>

    <div class="mb-6 space-y-2">
      <p class="text-gray-600">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
      </p>
      <p class="text-gray-600">Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
    </div>

    <!-- Search Form -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
      <form method="GET" action="{{ route('categories.index') }}"
        class="flex flex-wrap items-end gap-4">
        <div class="flex-1 min-w-96">
          <label for="search" class="block text-base font-medium text-gray-700 mb-3">
            <i class="fas fa-search mr-2"></i>Cari kategori:
          </label>
          <input type="text" class="form-input text-base py-3 px-4" id="search" name="search"
            value="{{ request('search') }}" placeholder="Masukkan nama kategori...">
        </div>
        <div>
          <button type="submit" class="btn-primary py-3 px-6 text-base">
            <i class="fas fa-search mr-2"></i>Cari
          </button>
        </div>
      </form>
    </div>

    <!-- Category Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="table-header">ID Kategori</th>
              <th class="table-header">Nama Kategori</th>
              <th class="table-header">Keterangan</th>
              <th class="table-header">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($categories as $category)
              <tr class="hover:bg-gray-50">
                <td class="table-cell">{{ $category->id }}</td>
                <td class="table-cell">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    {{ $category->nama_kategori }}
                  </span>
                </td>
                <td class="table-cell">{{ $category->keterangan }}</td>
                <td class="table-cell">
                  <div class="flex items-center space-x-2">
                    <button class="btn-danger text-xs px-3 py-1" data-id="{{ $category->id }}"
                      onclick="confirmDeleteCategory(this)">
                      <i class="fas fa-trash mr-1"></i>Hapus
                    </button>
                    <a href="{{ route('categories.edit', $category->id) }}"
                      class="btn-primary text-xs px-3 py-1">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                  <div class="flex flex-col items-center">
                    <i class="fas fa-tags text-4xl text-gray-300 mb-3"></i>
                    <p class="text-lg">Tidak ada data kategori.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Category Button -->
    <div class="mt-6">
      <a href="{{ route('categories.create') }}" class="btn-success">
        <i class="fas fa-plus mr-2"></i>Tambah Kategori Baru
      </a>
    </div>
  </div>

  <!-- Delete Form (Hidden) -->
  <form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
  </form>

@endsection
