<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>{{ $title ?? 'Inventaris Aset' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
            <h1 class="font-bold text-lg">📦 Inventaris Aset</h1>
            <a href="{{ route('assets.index') }}" class="text-blue-600 hover:underline">
                Daftar Aset
            </a>
        </div>
    </nav>

    <!-- Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 py-6">
        © {{ date('Y') }} Inventaris Kantor
    </footer>

</body>

</html>
