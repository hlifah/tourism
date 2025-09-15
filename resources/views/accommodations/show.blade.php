@extends('layouts.app')

@section('content')
@php
    $images = [
        'serena' => ['front.jpg', 'room.jpg', 'pool.jpg'],
        'ngorongoro' => ['view.jpg', 'lounge.jpg', 'room.jpg'],
        'zanzibar' => ['beach.jpg', 'dining.jpg', 'room.jpg'],
        'arusha' => ['lodge.jpg', 'coffee.jpg', 'room.jpg'],
        'fourseasons' => ['view.jpg', 'deck.jpg', 'pool.jpg'],
        'gibbs' => ['garden.jpg', 'dining.jpeg', 'room.jpg'],
        'singita' => ['tent.jpg', 'safari.jpg', 'lounge.avif'],
        'melia' => ['beach.jpg', 'spa.jpg', 'room.jpg'],
        'andbeyond' => ['treehouse.jpg', 'lounge.webp', 'deck.webp'],
    ];

    $names = [
        'serena' => 'Serena Hotel',
        'ngorongoro' => 'Ngorongoro Safari Lodge',
        'zanzibar' => 'Zanzibar Serena Hotel',
        'arusha' => 'Arusha Coffee Lodge',
        'fourseasons' => 'Four Seasons Safari Lodge',
        'gibbs' => "Gibb's Farm",
        'singita' => 'Singita Sabora Tented Camp',
        'melia' => 'Melia Zanzibar',
        'andbeyond' => 'andBeyond Lake Manyara Tree Lodge',
    ];

    $location = [
        'serena' => 'Dar es Salaam',
        'ngorongoro' => 'Ngorongoro Crater',
        'zanzibar' => 'Stone Town, Zanzibar',
        'arusha' => 'Arusha',
        'fourseasons' => 'Serengeti',
        'gibbs' => 'Karatu',
        'singita' => 'Grumeti, Serengeti',
        'melia' => 'Kiwengwa, Zanzibar',
        'andbeyond' => 'Lake Manyara',
    ];
@endphp

<div class="container my-5">
    <h2 class="mb-4">{{ $names[$name] ?? 'Accommodation' }}</h2>
    <p class="mb-3"><strong>Location:</strong> {{ $location[$name] ?? 'Tanzania' }}</p>
    <div class="row">
        @foreach ($images[$name] ?? [] as $img)
            <div class="col-md-4 mb-3">
                <div class="position-relative overflow-hidden">
                    <img src="/images/accommodations/{{ $name }}/{{ $img }}" class="img-fluid rounded zoom-img" alt="{{ $name }} Image">
                </div>
            </div>
        @endforeach
    </div>
    <p class="mt-4">
        Enjoy a relaxing stay at {{ $names[$name] ?? 'our hotel' }} with exceptional services and unique experiences in the heart of Tanzania.
    </p>
</div>

<style>
    .zoom-img {
        transition: transform 0.3s ease;
        cursor: zoom-in;
    }

    .zoom-img:hover {
        transform: scale(1.05);
    }
</style>
@endsection
