<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 font-bold text-xl border-b">Admin Panel</div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.scholarships.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Scholarships</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Manage Users</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.applications.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">List of Applications</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>
