@extends('layouts.app')

@section('content')
<h1>Új Autó Gyártó</h1>

  <form action="{{ route('car_makers.store') }}" method="POST">
      @csrf

      <label for="name">Autó Gyártó neve</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>

      <button type="submit">Mentés</button>
      <a href="{{ route('car_makers.index') }}">Mégse</a>
  </form>
@endsection