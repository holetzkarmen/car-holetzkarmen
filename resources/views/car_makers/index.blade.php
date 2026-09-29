@extends('layouts.app')

@section('content')

  <h1>Autó Gyártók</h1>
  <a href="{{route('car_makers.create')}}">Új Autó Gyártó</a>
  @foreach($car_makers as $car_maker)
      <p>{{ $car_maker->name }}
        <form action="{{ route('car_makers.destroy', $car_maker->id) }}" method="POST">
        <a href="{{ route('car_makers.edit', $car_maker->id) }}">Szerkesztés</a>
          @csrf
          @method('DELETE')
          <button type="submit">Törlés</button>
        </form>
      </p>
  @endforeach

@endsection