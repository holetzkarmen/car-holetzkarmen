@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-3xl font-bold text-white">Új Autó modell</h1>
<form action="{{ route('car_types.store') }}" method="POST" class="card max-w-xl p-6">
    @csrf
    @include('car_types._form')
</form>
@endsection