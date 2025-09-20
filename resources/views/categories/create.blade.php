@extends('layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
  <div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="breadcrumb">
      <ol class="flex space-x-2 text-sm text-gray-600">
        <li>
          <a href="{{ route('categories.index') }}"
            class="text-primary-600 hover:text-primary-700 hover:underline">
            Kategori Surat
          </a>
        </li>
        <li class="before:content-['/'] before:mr-2 before:text-gray-400 font-medium text-gray-900">
          Tambah
        </li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Tambah Kategori Baru</h2>

    <!-- Success Alert -->
    @if (session('success'))
      <div
        class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-check-circle mr-2"></i>
          {{ session('success') }}
        </div>
        <button type="button" class="text-green-600 hover:text-green-800"
          onclick="this.parentElement.style.display='none'">
          <i class="fas fa-times"></i>
        </button>
      </div>
    @endif

    <!-- Error Alert -->
    @if (session('error'))
      <div
        class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-exclamation-circle mr-2"></i>
          {{ session('error') }}
        </div>
        <button type="button" class="text-red-600 hover:text-red-800"
          onclick="this.parentElement.style.display='none'">
          <i class="fas fa-times"></i>
        </button>
      </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
      <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
        @csrf

        <!-- ID Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="id_kategori" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            ID Kategori
          </label>
          <div class="md:col-span-2">
            <input type="text" class="form-input text-base py-3 px-4 bg-gray-50 cursor-not-allowed"
              id="id_kategori" name="id_kategori" value="{{ $nextId }}" readonly>
            <p class="mt-1 text-sm text-gray-500">ID kategori akan dibuat otomatis</p>
          </div>
        </div>

        <!-- Nama Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="nama_kategori"
            class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            Nama Kategori
          </label>
          <div class="md:col-span-2">
            <input type="text"
              class="form-input text-base py-3 px-4 @error('nama_kategori') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
            @error('nama_kategori')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Keterangan -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <label for="keterangan" class="text-base font-medium text-gray-700 md:text-right md:pt-3">
            Keterangan
          </label>
          <div class="md:col-span-3">
            <textarea
              class="form-input text-base py-3 px-4 @error('keterangan') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan kategori...">{{ old('keterangan') }}</textarea>
            @error('keterangan')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div class="md:col-start-2 md:col-span-3">
            <div class="flex space-x-4">
              <a href="{{ route('categories.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
              </a>
              <button type="submit" class="btn-primary">
                <i class="fas fa-save mr-2"></i>Simpan
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
