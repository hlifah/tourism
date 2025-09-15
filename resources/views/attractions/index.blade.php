@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">All Tourist Attractions</h2>
    <div class="row">
        @foreach($attractions as $attraction)
        <div class="col-md-4 mb-4">
            <a href="{{ route('attractions.show', ['name' => $attraction['slug']]) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/attractions/' . $attraction['slug'] . '/' . $attraction['image']) }}" class="card-img-top" alt="{{ $attraction['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $attraction['name'] }}</h5>
                        <p>{{ $attraction['description'] }}</p>
                        <p class="text-muted"><strong>Area:</strong> {{ $attraction['region'] }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
