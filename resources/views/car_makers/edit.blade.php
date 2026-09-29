@extends('layouts.app')

@section('content')
<h1>Autó Gyártó módosítása</h1>

  <form action="{{ route('car_makers.update', $car_maker->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <label for="name">Autó gyártó neve</label>
      <input type="text" name="name" id="name" value="{{ old('name', $car_maker->name) }}" required>

      <button type="submit">Mentés</button>
      <a href="{{ route('car_makers.index') }}">Mégse</a>
  </form>
@endsection
