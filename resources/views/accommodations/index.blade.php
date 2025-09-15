@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">All Accommodations</h2>
    <div class="row">
        @php
            $accommodations = [
                ['name' => 'serena', 'title' => 'Serena Hotel', 'location' => 'Dar es Salaam', 'img' => 'front.jpg'],
                ['name' => 'ngorongoro', 'title' => 'Ngorongoro Safari Lodge', 'location' => 'Ngorongoro Crater', 'img' => 'view.jpg'],
                ['name' => 'zanzibar', 'title' => 'Zanzibar Serena Hotel', 'location' => 'Stone Town, Zanzibar', 'img' => 'beach.jpg'],
                ['name' => 'arusha', 'title' => 'Arusha Coffee Lodge', 'location' => 'Arusha', 'img' => 'lodge.jpg'],
                ['name' => 'fourseasons', 'title' => 'Four Seasons Safari Lodge', 'location' => 'Serengeti', 'img' => 'view.jpg'],
                ['name' => 'gibbs', 'title' => "Gibb's Farm", 'location' => 'Karatu', 'img' => 'garden.jpg'],
                ['name' => 'singita', 'title' => 'Singita Sabora Tented Camp', 'location' => 'Grumeti, Serengeti', 'img' => 'tent.jpg'],
                ['name' => 'melia', 'title' => 'Melia Zanzibar', 'location' => 'Kiwengwa, Zanzibar', 'img' => 'beach.jpg'],
                ['name' => 'andbeyond', 'title' => 'andBeyond Lake Manyara Tree Lodge', 'location' => 'Lake Manyara', 'img' => 'treehouse.jpg'],
            ];
        @endphp

        @foreach ($accommodations as $accommodation)
            <div class="col-md-4 mb-4">
                <a href="{{ route('accommodations.show', ['name' => $accommodation['name']]) }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="/images/accommodations/{{ $accommodation['name'] }}/{{ $accommodation['img'] }}" class="card-img-top" alt="{{ $accommodation['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $accommodation['title'] }}</h5>
                            <p class="text-muted"><strong>Location:</strong> {{ $accommodation['location'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
