<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/produk.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url('index') }}">Home</a></li>
            <li><a href="{{ url('produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header style="display: flex; justify-content:space-between">
            <h1>Daftar Produk</h1>

            <div>
                <button class="card-button"><a class="text-decoration-none text-wh" href="{{ url('/produk/add')}}">Add Product</a></button>
            </div>
        </header>
        <h6>Temukan produk terbaik untuk kebutuhan Anda</h6>

        <!-- Product Grid -->
        <div class="product-grid">
            <!-- product card 1 -->
            @foreach ($produk as $item)

            <div class="product-card">
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Flifestyle.batampos.co.id%2Fcara-daftar-driver-shopee-food%2F&psig=AOvVaw1yqaqzudhOhX_kYMKTBbc5&ust=1729606623939000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCJDr24LVn4kDFQAAAAAdAAAAABAI" alt="produk 1">
                <h3>{{ $item->nama_produk }}</h3>
                <p class="price">{{ $item->harga }}</p>
                <p class="description">{{ $item->deskripsi }}</p>
                <button class="add-to-cart">Edit</button>
                <form action="{{ url('produk/delete/'. $item->kode_produk) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cancel-to-cart">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
    </footer>
</body>
</html>
