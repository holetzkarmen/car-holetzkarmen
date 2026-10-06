<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LaravelApp') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen bg-slate-950 font-sans text-slate-200 antialiased">
    {{-- háttér fények --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -left-40 h-[32rem] w-[32rem] rounded-full bg-violet-600/30 blur-3xl"></div>
        <div class="absolute top-1/3 -right-40 h-[28rem] w-[28rem] rounded-full bg-fuchsia-600/20 blur-3xl"></div>
        <div class="absolute -bottom-40 left-1/3 h-[26rem] w-[26rem] rounded-full bg-sky-600/20 blur-3xl"></div>
    </div>

    @include('layouts.navigation')

    <main class="mx-auto max-w-5xl px-4 py-10">
        @if (session('status'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                <span>✔</span> {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="py-8 text-center text-xs text-slate-500">
        {{ config('app.name', 'LaravelApp') }} · PHP {{ PHP_VERSION }}
    </footer>
</body>
</html>