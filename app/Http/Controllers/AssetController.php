<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Category;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kategori untuk filter dropdown
        $categories = Category::orderBy('name')->get();

        // Query dasar asset + relasi
        $assets = Asset::with(['category', 'vendor'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->condition, function ($query) use ($request) {
                $query->where('condition', $request->condition);
            })
            ->latest()
            ->paginate(9)
            ->withQueryString(); // supaya filter gak hilang pas pagination

        return view('assets.index', [
            'title' => 'Daftar Aset',
            'assets' => $assets,
            'categories' => $categories,
        ]);
    }

    /**
     * Halaman detail aset
     */
    public function show(Asset $asset)
    {
        // Load relasi biar aman
        $asset->load(['category', 'vendor']);

        return view('assets.show', [
            'title' => $asset->name,
            'asset' => $asset,
        ]);
    }
}