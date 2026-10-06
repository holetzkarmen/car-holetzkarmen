@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-3xl font-bold text-white">Autó Gyártó módosítása</h1>
<form action="{{ route('car_makers.update', $car_maker) }}" method="POST" class="card max-w-xl p-6">
    @csrf @method('PATCH')
    @include('car_makers._form')
</form>
@endsection