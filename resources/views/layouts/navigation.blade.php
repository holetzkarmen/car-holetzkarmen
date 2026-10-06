<nav class="sticky top-0 z-10 border-b border-white/10 bg-slate-950/60 backdrop-blur-xl">
    <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-3">
        <a href="{{ url('/') }}" class="flex items-center gap-2 text-lg font-bold">
            <span class="text-2xl">🏎️</span>
            <span class="bg-gradient-to-r from-violet-400 to-fuchsia-400 bg-clip-text text-transparent">AutóKatalógus</span>
        </a>
        <div class="flex gap-2 text-sm font-medium">
            <a href="{{ route('car_makers.index') }}"
               class="rounded-lg px-4 py-2 transition {{ request()->routeIs('car_makers.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                Gyártók
            </a>
            <a href="{{ route('car_types.index') }}"
               class="rounded-lg px-4 py-2 transition {{ request()->routeIs('car_types.*') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                Modellek
            </a>
        </div>
    </div>
</nav>