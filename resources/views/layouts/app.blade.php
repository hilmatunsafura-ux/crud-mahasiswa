<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Data Mahasiswa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', ui-sans-serif, system-ui, sans-serif; }
        .font-display { font-family: 'Poppins', 'Nunito', ui-sans-serif, sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-pink-50 via-white to-yellow-50 text-stone-700">
    <nav class="sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-pink-100">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-2xl bg-gradient-to-br from-pink-300 to-yellow-200 flex items-center justify-center text-xl">🎓</span>
                <span class="font-display font-bold text-lg text-pink-600">SiMahasiswa</span>
            </a>
            <span class="text-xs sm:text-sm rounded-full bg-yellow-100 text-yellow-800 px-3 py-1">Tugas Laravel CRUD</span>
        </div>
    </nav>

    <main class="max-w-6xl w-full mx-auto px-4 py-8 space-y-6 flex-1">
        @if (session('sukses'))
            <div class="flex items-center gap-3 rounded-2xl bg-yellow-100 border border-yellow-300 text-yellow-900 px-5 py-3 text-sm shadow-sm">
                <span class="text-lg">✅</span>
                <span class="font-semibold">{{ session('sukses') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-xs text-stone-400 py-6">
        Dibuat dengan Laravel 💗
    </footer>
</body>
</html>