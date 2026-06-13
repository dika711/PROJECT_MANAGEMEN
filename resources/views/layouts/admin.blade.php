<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-4 text-xl font-bold border-b">
            Ringkas Admin
        </div>
        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 mb-2 rounded 
               {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-2 mb-2 rounded 
               {{ request()->routeIs('admin.users') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                Data User
            </a>

            <a href="{{ route('admin.profile') }}"
   class="block px-4 py-2 mb-2 rounded 
   {{ request()->routeIs('admin.profile') ? 'bg-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
    Profil
</a>


            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2 rounded text-gray-700 hover:bg-red-100">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</body>
</html>
