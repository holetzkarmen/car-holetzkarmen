@extends('layouts.app')

@section('content')
<h1>Autó modell módosítása</h1>

  <form action="{{ route('car_types.update', $car_type->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <label for="name">Autó modell neve</label>
      <input type="text" name="name" id="name" value="{{ old('name', $car_type->name) }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <label for="year">Évjárat</label>
      <input type="text" name="year" id="year" value="{{ old('year', $car_type->year) }}" required>
      @error('year')
          <div class="error">{{ $message }}</div>
      @enderror

      <label for="car_maker_id">Autó Gyártó</label>
      <select name="car_maker_id" id="car_maker_id" required>
          <option value="">-- Válassz Autó Gyártót --</option>
          @foreach($car_makers as $car_maker)
              <option value="{{ $car_maker->id }}" {{ old('car_maker_id', $car_type->car_maker_id) == $car_maker->id ? 'selected' : '' }}>
                  {{ $car_maker->name }}
              </option>
          @endforeach
      </select>
      @error('car_maker_id')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">Mentés</button>
      <a href="{{ route('car_types.index') }}">Mégse</a>
  </form>
@endsection