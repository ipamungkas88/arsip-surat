@extends('layouts.app')

@section('title', 'About')

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
          About
        </li>
      </ol>
    </nav>

    <h2 class="text-3xl font-bold text-gray-900 mb-6">About</h2>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        <!-- Developer Photo -->
        <div class="md:col-span-1">
          <div class="mx-auto w-40 h-48 border-2 border-gray-800 bg-white p-1">
            <img src="{{ asset('images/developer.jpg') }}" alt="M.Firdaus Suraningrat"
              class="w-full h-full object-cover object-center">
          </div>
        </div>

        <!-- Developer Info -->
        <div class="md:col-span-2">
          <div class="space-y-6">
            <div>
              <h5 class="text-xl font-semibold text-gray-900 mb-4">Aplikasi ini dibuat oleh:</h5>

              <div class="space-y-3">
                <div class="flex items-start">
                  <div class="w-20 text-sm font-medium text-gray-700">Nama</div>
                  <div class="text-sm text-gray-900 mx-2">:</div>
                  <div class="text-sm text-gray-900">Pamungkas Suri Zuqna</div>
                </div>

                <div class="flex items-start">
                  <div class="w-20 text-sm font-medium text-gray-700">Prodi</div>
                  <div class="text-sm text-gray-900 mx-2">:</div>
                  <div class="text-sm text-gray-900">D3-MI PSDKU Kediri</div>
                </div>

                <div class="flex items-start">
                  <div class="w-20 text-sm font-medium text-gray-700">NIM</div>
                  <div class="text-sm text-gray-900 mx-2">:</div>
                  <div class="text-sm text-gray-900">2331730129</div>
                </div>

                <div class="flex items-start">
                  <div class="w-20 text-sm font-medium text-gray-700">Tanggal</div>
                  <div class="text-sm text-gray-900 mx-2">:</div>
                  <div class="text-sm text-gray-900">19 September 2025</div>
                </div>
              </div>
            </div>

            <!-- Additional Info -->
            <div class="pt-4 border-t border-gray-200">
              <h6 class="text-lg font-medium text-gray-900 mb-3">Tentang Aplikasi</h6>
              <div class="space-y-2 text-sm text-gray-600">
                <p>Aplikasi Arsip Surat Desa Karangduren dibuat untuk memudahkan pengelolaan dan
                  penyimpanan surat-surat resmi desa secara digital.</p>
                <p class="flex items-center">
                  <i class="fas fa-code mr-2 text-primary-500"></i>
                  Dibangun dengan Laravel, Tailwind CSS, dan teknologi web modern.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
