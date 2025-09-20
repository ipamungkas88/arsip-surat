<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', '📄 Arsip Surat - Desa Karangduren')</title>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml"
    href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📄</text></svg>">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet">

  <!-- Vite Assets -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-80 bg-white shadow-lg border-r border-gray-200">
      <div class="p-6">
        <div class="text-center mb-8">
          <div class="mb-4">
            <i class="fas fa-building text-primary-500 text-5xl mb-3"></i>
          </div>
          <h5 class="text-xl font-semibold text-gray-800 mb-1">
            <i class="fas fa-archive mr-2"></i>Arsip Surat
          </h5>
          <small class="text-gray-600">Desa Karangduren</small>
        </div>
        <hr class="border-gray-200 mb-6">

        <nav class="space-y-1">
          <a href="{{ route('arsip.index') }}"
            class="sidebar-link {{ request()->routeIs('arsip.*') && !request()->routeIs('arsip.about') ? 'sidebar-link-active' : '' }}">
            <i class="fas fa-file-archive mr-3"></i>Arsip Surat
          </a>

          <a href="{{ route('categories.index') }}"
            class="sidebar-link {{ request()->routeIs('categories.*') ? 'sidebar-link-active' : '' }}">
            <i class="fas fa-tags mr-3"></i>Kategori Surat
          </a>

          <a href="{{ route('arsip.about') }}"
            class="sidebar-link {{ request()->routeIs('arsip.about') ? 'sidebar-link-active' : '' }}">
            <i class="fas fa-user-circle mr-3"></i>About
          </a>
        </nav>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <main class="flex-1 p-8">
        <!-- Success Alert -->
        @if (session('success'))
          <div
            class="mb-6 bg-success-50 border border-success-200 text-success-800 px-4 py-3 rounded-md relative"
            role="alert">
            <div class="flex items-center">
              <i class="fas fa-check-circle mr-2"></i>
              <span>{{ session('success') }}</span>
              <button type="button"
                class="absolute top-2 right-2 text-success-600 hover:text-success-800"
                onclick="this.parentElement.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        @endif

        <!-- Error Alert -->
        @if (session('error'))
          <div
            class="mb-6 bg-danger-50 border border-danger-200 text-danger-800 px-4 py-3 rounded-md relative"
            role="alert">
            <div class="flex items-center">
              <i class="fas fa-exclamation-circle mr-2"></i>
              <span>{{ session('error') }}</span>
              <button type="button"
                class="absolute top-2 right-2 text-danger-600 hover:text-danger-800"
                onclick="this.parentElement.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom JavaScript -->
  <script src="{{ asset('js/confirmation.js') }}"></script>

  @stack('scripts')
</body>

</html>
