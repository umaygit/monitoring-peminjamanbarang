<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Peminjaman Barang') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tambahan CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Wrapper -->
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
            <div class="bg-gray-800 text-white w-full md:w-64 p-4 space-y-2 md:space-y-4 md:block hidden md:h-auto" id="sidebar">
                <h2 class="text-lg font-semibold">SISTEM MONITORING PEMINJAMAN</h2>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="{{ route('barangs.index') }}" class="block p-3 rounded hover:bg-gray-700 text-white">📦 Data Barang</a>
                    </li>
                    <li>
                        <a href="{{ route('peminjamans.index') }}" class="block p-3 rounded hover:bg-gray-700 text-white">📋 Data Peminjaman</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="block p-3 rounded hover:bg-gray-700 text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    </li>
                </ul>
            </div>


        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden p-4 flex justify-between items-center bg-gray-800 text-white">
            <button onclick="toggleSidebar()" class="text-white focus:outline-none">
                ☰ Menu
            </button>
            <h2 class="text-md font-semibold">{{ config('app.name', 'Dashboard') }}</h2>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow rounded">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="mt-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Toggle Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('block');
            } else {
                sidebar.classList.remove('block');
                sidebar.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
