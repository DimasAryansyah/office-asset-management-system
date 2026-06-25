@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="w-full h-96 flex items-center justify-center bg-gray-100 rounded-lg shadow">
                <img src="{{ asset('storage/' . $asset->photo) }}" class="max-h-96 max-w-full object-contain"
                    alt="{{ $asset->name }}">
            </div>

            <div>
                <h2 class="text-3xl font-bold mb-4">{{ $asset->name }}</h2>

                <ul class="space-y-2">
                    <li><strong>Kategori:</strong> {{ $asset->category->name }}</li>
                    <li><strong>Vendor:</strong> {{ $asset->vendor->company_name }}</li>
                    <li>
                        <strong>Tanggal Beli:</strong>
                        {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d M Y') }}
                    </li>
                    <li><strong>Harga:</strong> Rp {{ number_format($asset->price, 0, ',', '.') }}</li>
                    <li>
                        <strong>Kondisi:</strong>
                        <span
                            class="
                            inline-block mt-2 px-3 py-1 text-xs rounded-full
                            @if ($asset->condition === 'Baik') bg-green-100 text-green-700
                            @elseif($asset->condition === 'Rusak') bg-red-100 text-red-700
                            @else bg-yellow-100 text-yellow-700 @endif
                        ">
                            {{ $asset->condition }}
                        </span>
                    </li>
                </ul>

                <a href="{{ route('assets.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">
                    ← Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
@endsection
