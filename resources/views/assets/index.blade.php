@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Daftar Aset</h2>

    <!-- Filter -->
    <form method="GET" id="filterForm" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

        <!-- Search -->
        <input type="text" id="searchInput" placeholder="Cari nama barang..." class="border rounded px-4 py-2"
            oninput="searchAsset()">


        <!-- Category -->
        <select name="category" id="categorySelect" class="border rounded px-4 py-2">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <!-- Condition -->
        <select name="condition" id="conditionSelect" class="border rounded px-4 py-2">
            <option value="">Semua Kondisi</option>
            <option value="Baik" @selected(request('condition') == 'Baik')>Baik</option>
            <option value="Rusak" @selected(request('condition') == 'Rusak')>Rusak</option>
            <option value="Hilang" @selected(request('condition') == 'Hilang')>Hilang</option>
        </select>
    </form>

    <!-- Grid Asset -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($assets as $asset)
            <div class="bg-white rounded-lg shadow overflow-hidden asset-card" data-name="{{ strtolower($asset->name) }}">
                <img src="{{ asset('storage/' . $asset->photo) }}" class="h-48 w-full object-contain"
                    alt="{{ $asset->name }}">

                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $asset->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $asset->category->name }}</p>

                    <p class="mt-2 font-medium">
                        Rp {{ number_format($asset->price, 0, ',', '.') }}
                    </p>

                    <span
                        class="
                            inline-block mt-2 px-3 py-1 text-xs rounded-full
                            @if ($asset->condition === 'Baik') bg-green-100 text-green-700
                            @elseif($asset->condition === 'Rusak') bg-red-100 text-red-700
                            @else bg-yellow-100 text-yellow-700 @endif
                        ">
                        {{ $asset->condition }}
                    </span>


                    <a href="{{ route('assets.show', $asset) }}"
                        class="block text-center mt-4 text-blue-600 hover:underline">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Data aset belum tersedia.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $assets->links() }}
    </div>

    <!-- Auto Submit Filter -->
    <script>
        const form = document.getElementById('filterForm');

        // Search
        function searchAsset() {
            const keyword = document
                .getElementById('searchInput')
                .value
                .toLowerCase();

            const cards = document.querySelectorAll('.asset-card');

            cards.forEach(card => {
                const name = card.dataset.name;

                if (name.includes(keyword)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Category
        document.getElementById('categorySelect').addEventListener('change', () => {
            form.submit();
        });

        // Condition 
        document.getElementById('conditionSelect').addEventListener('change', () => {
            form.submit();
        });
    </script>
@endsection
