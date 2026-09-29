@extends('layouts.app')

@section('content')
<h1>Új Autó modell</h1>

  <form action="{{ route('car_types.store') }}" method="POST">
      @csrf

      <label for="name">Autó modell neve</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <label for="year">Évjárat</label>
      <input type="text" name="year" id="year" value="{{ old('year') }}" required>
      @error('year')
          <div class="error">{{ $message }}</div>
      @enderror

      <label for="car_type_id">Autó Gyártó</label>
      <select name="car_type_id" id="car_type_id" required>
          <option value="">-- Válassz Autó Gyártót --</option>
          @foreach($car_makers as $car_type)
              <option value="{{ $car_type->id }}" {{ old('car_type_id') == $car_type->id ? 'selected' : '' }}>
                  {{ $car_type->name }}
              </option>
          @endforeach
      </select>
      @error('car_type_id')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">Mentés</button>
      <a href="{{ route('car_types.index') }}">Mégse</a>
  </form>
@endsection