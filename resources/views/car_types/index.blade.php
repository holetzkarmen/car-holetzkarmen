@extends('layouts.app')

@section('content')

  <h1>Autó modellek</h1>
  <a href="{{route('car_types.create')}}">Új autó modell</a>
  @foreach($car_types as $car_type)
      <p>{{ $car_type->name }}; {{ $car_type->year }}; {{ $car_type->car_maker->name}}
        <form action="{{ route('car_types.destroy', $car_type->id) }}" method="POST">
        <a href="{{ route('car_types.edit', $car_type->id) }}">Szerkesztés</a>
          @csrf
          @method('DELETE')
          <button type="submit">Törlés</button>
        </form>
      </p>
  @endforeach

@endsection