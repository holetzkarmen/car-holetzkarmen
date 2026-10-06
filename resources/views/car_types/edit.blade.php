@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-3xl font-bold text-white">Autó modell módosítása</h1>
<form action="{{ route('car_types.update', $car_type) }}" method="POST" class="card max-w-xl p-6">
    @csrf @method('PATCH')
    @include('car_types._form')
</form>
@endsection