<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Perkakas</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <span class="font-bold text-xl text-indigo-600">Inventaris Perkakas</span>
            @auth
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Halo, <b>{{ auth()->user()->name }}</b> (Role: <span class="uppercase text-indigo-600 font-semibold">{{ auth()->user()->role }}</span>)</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>
</body>
</html>