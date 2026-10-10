<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Form Edit Book</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk memperbarui data. Perhatikan penggunaan method PUT dan rute ke update -->
        <form action="{{ route('book.update', $book['id'] ?? $book->id) }}" method="POST">
            {{-- <form action="" method="POST"> --}}
            @csrf <!-- Wajib ada di Laravel untuk keamanan CSRF -->
            @method('PUT') <!-- Wajib ada untuk request update di Laravel -->

            <!-- Input Judul Buku -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Book Title</label>
                <input type="text" name="title" id="title" required value="{{ $book['title'] }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan judul buku...">
            </div>

            <!-- Input Penulis -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                <input type="text" name="author" id="author" required
                    value="{{ old('author', $book['author'] ?? $book->author) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama penulis...">
            </div>

            <!-- Input Tahun Terbit -->
            <div class="mb-6">
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Publication Year</label>
                <input type="number" name="year" id="year" min="1900" max="2100" required
                    value="{{ old('year', $book['year'] ?? $book->year) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: 2024">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-between">
                <a href="{{ route('book.index') }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Update Book
                </button>
            </div>
        </form>
    </div>
</body>

</html>
