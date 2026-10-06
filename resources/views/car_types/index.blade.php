@extends('layouts.app')

@section('content')
<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-white">Autó modellek</h1>
        <p class="text-sm text-slate-400">{{ $car_types->count() }} találat</p>
    </div>
    <a href="{{ route('car_types.create') }}" class="btn-primary">＋ Új modell</a>
</div>

<form method="GET" action="{{ route('car_types.index') }}" class="mb-6 grid gap-2 sm:grid-cols-[1fr_14rem_auto_auto]">
    <input type="text" name="search" value="{{ $search }}" placeholder="🔍 Keresés modell neve szerint..." class="input">
    <select name="car_maker_id" class="input" onchange="this.form.submit()">
        <option value="">Minden gyártó</option>
        @foreach($car_makers as $car_maker)
            <option value="{{ $car_maker->id }}" {{ $car_maker_id == $car_maker->id ? 'selected' : '' }}>
                {{ $car_maker->name }}
            </option>
        @endforeach
    </select>
    <button class="btn-primary" type="submit">Keresés</button>
    @if($search || $car_maker_id)
        <a href="{{ route('car_types.index') }}" class="btn-ghost">Törlés</a>
    @endif
</form>

<div class="card overflow-hidden">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-wider text-slate-400">
            <tr>
                <th class="px-5 py-3">Modell</th>
                <th class="px-5 py-3">Évjárat</th>
                <th class="px-5 py-3">Gyártó</th>
                <th class="px-5 py-3 text-right">Műveletek</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($car_types as $car_type)
                <tr class="transition hover:bg-white/5">
                    <td class="px-5 py-4 font-semibold text-white">{{ $car_type->name }}</td>
                    <td class="px-5 py-4 text-slate-300">{{ $car_type->year }}</td>
                    <td class="px-5 py-4">
                        <span class="rounded-full bg-fuchsia-500/20 px-3 py-1 text-xs font-semibold text-fuchsia-300">
                            {{ $car_type->car_maker->name }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('car_types.edit', $car_type) }}" class="btn-small">✏️ Szerkesztés</a>
                            <form action="{{ route('car_types.destroy', $car_type) }}" method="POST"
                                  onsubmit="return confirm('Biztosan törlöd?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger">🗑 Törlés</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-5 py-10 text-center text-slate-500">Nincs találat.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection