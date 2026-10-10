<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Book</title>
    <!-- Tailwind CSS CDN untuk styling sederhana -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Form Create Book</h1>
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Form untuk mengirim data ke route store -->

        <form action="{{ route('book.store') }}" method="POST">
            @csrf <!-- Wajib ada di Laravel untuk keamanan CSRF -->

            <!-- Input Judul Buku -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Title</label>
                <input type="text" name="title" id="title" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan judul buku...">
            </div>

            <!-- Input Penulis -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                <input type="text" name="author" id="author" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama penulis...">
            </div>

            <!-- Input Tahun Terbit -->
            <div class="mb-6">
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Publication Year</label>
                <input type="number" name="year" id="year" min="1900" max="2100" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: 2024">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-between">
                <a href="{{ route('book.index') }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Save Book
                </button>
            </div>
        </form>
    </div>
</body>

</html>
