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
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->year }}</td>
                                <td>
                                    <a href="/edit-book/{{ $item->id }}"
                                        class="text-blue-500 hover:text-blue-700">Edit</a>
                                    | <a href="/delete-book/{{ $item->id }}"
                                        class="text-red-500 hover:text-red-700">Delete</a>
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
