@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-3xl font-bold text-white">Új Autó Gyártó</h1>
<form action="{{ route('car_makers.store') }}" method="POST" class="card max-w-xl p-6">
    @csrf
    @include('car_makers._form')
</form>
@endsection