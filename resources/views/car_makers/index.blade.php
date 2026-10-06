@extends('layouts.app')

@section('content')
<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-white">Autó Gyártók</h1>
        <p class="text-sm text-slate-400">{{ $car_makers->count() }} találat</p>
    </div>
    <a href="{{ route('car_makers.create') }}" class="btn-primary">＋ Új gyártó</a>
</div>

<form method="GET" action="{{ route('car_makers.index') }}" class="mb-6 flex gap-2">
    <input type="text" name="search" value="{{ $search }}" placeholder="🔍 Keresés gyártó neve szerint..." class="input">
    <button class="btn-primary" type="submit">Keresés</button>
    @if($search)
        <a href="{{ route('car_makers.index') }}" class="btn-ghost">Törlés</a>
    @endif
</form>

<div class="card overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-5 py-3">Név</th>
                <th class="px-5 py-3">Modellek</th>
                <th class="px-5 py-3 text-right">Műveletek</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($car_makers as $car_maker)
                <tr class="transition hover:bg-white/5">
                    <td class="px-5 py-4 font-semibold text-white">{{ $car_maker->name }}</td>
                    <td class="px-5 py-4">
                        <a href="{{ route('car_types.index', ['car_maker_id' => $car_maker->id]) }}"
                           class="rounded-full bg-violet-500/20 px-3 py-1 text-xs font-semibold text-violet-300 hover:bg-violet-500/30">
                            {{ $car_maker->car_types_count }} modell →
                        </a>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('car_makers.edit', $car_maker) }}" class="btn-small">✏️ Szerkesztés</a>
                            <form action="{{ route('car_makers.destroy', $car_maker) }}" method="POST"
                                  onsubmit="return confirm('Biztosan törlöd? A hozzá tartozó modellek is törlődnek!')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">🗑 Törlés</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="px-5 py-10 text-center text-slate-500">Nincs találat.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection