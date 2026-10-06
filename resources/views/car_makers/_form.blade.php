<div class="mb-5">
    <label for="name" class="label">Autó Gyártó neve</label>
    <input type="text" name="name" id="name" class="input"
           value="{{ old('name', $car_maker->name ?? '') }}" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="flex gap-2">
    <button type="submit" class="btn-primary">💾 Mentés</button>
    <a href="{{ route('car_makers.index') }}" class="btn-ghost">Mégse</a>
</div>