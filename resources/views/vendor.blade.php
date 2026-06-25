<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style>
        .asset-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .asset-card {
            position: relative;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 200px;
            flex-direction: column;
            gap: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .asset-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .asset-card img {
            width: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            font-size: 0.8rem;
            display: inline-block;
        }

        .baik {
            background-color: green;
        }

        .rusak {
            background-color: red;
        }

        .hilang {
            background-color: orange;
        }
    </style>

    <h1 style="text-align: center">Daftar Asset</h1>

    <div class="asset-container">
        @foreach ($assets as $asset)
            <div class="asset-card">
                <img src="/assets/{{ basename($asset->photo) }}" alt="{{ $asset->name }}">
                <p style="font-weight: bold">Rp {{ number_format($asset->price, 0, ',', '.') }}</p>
                <p>{{ $asset->name }}</p>
                <p>Kategori: {{ $asset->category->name }}</p>
                <span class="badge {{ $asset->condition }}">
                    {{ ucfirst($asset->condition) }}
                </span>
            </div>
        @endforeach
    </div>

    </body>

</html>
