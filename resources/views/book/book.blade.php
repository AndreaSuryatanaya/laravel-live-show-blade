<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Data</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans antialiased">

    <div class="max-w-6xl mx-auto px-4 py-10">
        <!-- Header & Add Button -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Book List</h2>
                <p class="text-sm text-gray-500 mb-0">Manage your library book data easily</p>
            </div>
            <a href="/create-book"
                class="bg-[#84cc16] hover:bg-[#65a30d] text-black font-medium px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-2">
                <i class="fas fa-plus"></i>Add Book
            </a>
        </div>

        <!-- Book Data Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-xs font-semibold text-gray-600 uppercase tracking-wider ps-6">No
                            </th>
                            <th class="py-3 px-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Book
                                Title</th>
                            <th class="py-3 px-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Author
                            </th>
                            <th class="py-3 px-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Publication Year</th>
                            <th
                                class="py-3 px-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-end pe-6">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach ($book as $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-3 px-4 ps-6 font-semibold text-gray-500">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $item->title }}</td>
                                <td class="py-3 px-4 text-gray-500">{{ $item->author }}</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-md border border-gray-200">
                                        {{ $item->publish_year }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-end pe-6">
                                    <!-- Tombol Edit & Delete Berjajar Ramping ke Samping -->
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('book.edit', $item['id'] ?? $item->id) }}"
                                            class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Form Tombol Delete -->
                                        <form action="{{ route('book.destroy', $item['id'] ?? $item->id) }}"
                                            method="POST" class="inline-block m-0"
                                            onsubmit="return confirm('Are you sure, Delete ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                                title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
