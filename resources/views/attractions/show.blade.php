@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">{{ $attraction['name'] }}</h2>
    <p class="mb-3"><strong>Area:</strong> {{ $attraction['region'] }}</p>
    <div class="row">
        @foreach ($attraction['gallery'] as $img)
        <div class="col-md-4 mb-3">
            <img src="{{ asset('images/attractions/' . $attraction['slug'] . '/' . $img) }}" class="img-fluid rounded shadow-sm" alt="{{ $attraction['name'] }} Image">
        </div>
        @endforeach
    </div>
    <p class="mt-4">{{ $attraction['full_description'] }}</p>
</div>
@endsection
