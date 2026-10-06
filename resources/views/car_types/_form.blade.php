<div class="mb-5">
    <label for="name" class="label">Autó modell neve</label>
    <input type="text" name="name" id="name" class="input" value="{{ old('name', $car_type->name ?? '') }}" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="mb-5">
    <label for="year" class="label">Évjárat</label>
    <input type="text" name="year" id="year" class="input" value="{{ old('year', $car_type->year ?? '') }}" required>
    @error('year') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="mb-6">
    <label for="car_maker_id" class="label">Autó Gyártó</label>
    <select name="car_maker_id" id="car_maker_id" class="input" required>
        <option value="">-- Válassz Autó Gyártót --</option>
        @foreach($car_makers as $car_maker)
            <option value="{{ $car_maker->id }}"
                {{ old('car_maker_id', $car_type->car_maker_id ?? '') == $car_maker->id ? 'selected' : '' }}>
                {{ $car_maker->name }}
            </option>
        @endforeach
    </select>
    @error('car_maker_id') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="flex gap-2">
    <button type="submit" class="btn-primary">💾 Mentés</button>
    <a href="{{ route('car_types.index') }}" class="btn-ghost">Mégse</a>
</div>