@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Payment Structure for Accommodations & Tourist Attractions</h2>
    <p class="text-center text-muted">Select your preferred accommodation or tourist attraction and proceed to payment.</p>

    @php
        $exchangeRate = 2500;

        // Accommodation data
        $accommodations = [
            ['name' => 'serena', 'title' => 'Serena Hotel', 'location' => 'Dar es Salaam', 'price' => 150, 'img' => 'front.jpg'],
            ['name' => 'ngorongoro', 'title' => 'Ngorongoro Safari Lodge', 'location' => 'Ngorongoro Crater', 'price' => 200, 'img' => 'view.jpg'],
            ['name' => 'zanzibar', 'title' => 'Zanzibar Serena Hotel', 'location' => 'Stone Town, Zanzibar', 'price' => 180, 'img' => 'beach.jpg'],
            ['name' => 'arusha', 'title' => 'Arusha Coffee Lodge', 'location' => 'Arusha', 'price' => 130, 'img' => 'lodge.jpg'],
            ['name' => 'fourseasons', 'title' => 'Four Seasons Safari Lodge', 'location' => 'Serengeti', 'price' => 220, 'img' => 'view.jpg'],
            ['name' => 'gibbs', 'title' => "Gibb's Farm", 'location' => 'Karatu', 'price' => 170, 'img' => 'garden.jpg'],
            ['name' => 'singita', 'title' => 'Singita Sabora Tented Camp', 'location' => 'Grumeti, Serengeti', 'price' => 250, 'img' => 'tent.jpg'],
            ['name' => 'melia', 'title' => 'Melia Zanzibar', 'location' => 'Kiwengwa, Zanzibar', 'price' => 160, 'img' => 'beach.jpg'],
            ['name' => 'andbeyond', 'title' => 'andBeyond Lake Manyara Tree Lodge', 'location' => 'Lake Manyara', 'price' => 210, 'img' => 'treehouse.jpg'],
        ];

        // Tourist Attraction data
        $attractions = [
            ['slug' => 'serengeti', 'name' => 'Serengeti National Park', 'image' => 'lions.webp', 'description' => 'A famous national park in Tanzania, known for the Great Migration.', 'region' => 'Serengeti', 'price_usd' => 150, 'price_tzs' => 375000],
            ['slug' => 'ngorongoro', 'name' => 'Ngorongoro Crater', 'image' => 'crater.jpg', 'description' => 'A large volcanic caldera and a UNESCO World Heritage Site.', 'region' => 'Ngorongoro', 'price_usd' => 180, 'price_tzs' => 450000],
            ['slug' => 'stone-town', 'name' => 'Stone Town', 'image' => 'doors.jpg', 'description' => 'A historic town with Swahili-Arabic heritage.', 'region' => 'Zanzibar', 'price_usd' => 120, 'price_tzs' => 300000],
            ['slug' => 'kilimanjaro', 'name' => 'Mount Kilimanjaro', 'image' => 'peak.jpg', 'description' => 'The highest peak in Africa, perfect for trekkers and climbers.', 'region' => 'Kilimanjaro', 'price_usd' => 500, 'price_tzs' => 1250000],
            ['slug' => 'ruaha', 'name' => 'Ruaha National Park', 'image' => 'elephants.jpg', 'description' => 'Remote and rugged, home to vast elephant herds.', 'region' => 'Iringa', 'price_usd' => 200, 'price_tzs' => 500000],
            ['slug' => 'lake-victoria', 'name' => 'Lake Victoria', 'image' => 'rock.jpg', 'description' => 'Africa’s largest lake, with beautiful fishing villages.', 'region' => 'Mwanza', 'price_usd' => 100, 'price_tzs' => 250000],
            ['slug' => 'selous', 'name' => 'Selous Game Reserve', 'image' => 'river.jpg', 'description' => 'Known for boat safaris and remote wildlife viewing.', 'region' => 'Morogoro', 'price_usd' => 250, 'price_tzs' => 625000],
            ['slug' => 'mikumi', 'name' => 'Mikumi National Park', 'image' => 'giraffe.jpg', 'description' => 'Easily accessible park with rich plains wildlife.', 'region' => 'Morogoro', 'price_usd' => 130, 'price_tzs' => 325000],
            ['slug' => 'matema', 'name' => 'Matema Beach', 'image' => 'lake.jpg', 'description' => 'A tranquil beach on Lake Nyasa’s northern shore.', 'region' => 'Mbeya', 'price_usd' => 90, 'price_tzs' => 225000],
            ['slug' => 'kondoa', 'name' => 'Kondoa Rock Art', 'image' => 'rockart1.jpg', 'description' => 'Ancient rock paintings and a UNESCO heritage site.', 'region' => 'Dodoma', 'price_usd' => 70, 'price_tzs' => 175000],
        ];
    @endphp

    <!-- Accommodations Section -->
    <h3 class="my-5 text-center">Accommodations</h3>
    <div class="row">
        @foreach ($accommodations as $acc)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('images/accommodations/' . $acc['name'] . '/' . $acc['img']) }}" class="card-img-top" alt="{{ $acc['title'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $acc['title'] }}</h5>
                        <p class="card-text text-muted"><strong>Location:</strong> {{ $acc['location'] }}</p>
                        <p class="card-text">
                            <strong>Price:</strong> 
                            TSh {{ number_format($acc['price'] * $exchangeRate) }} |
                            ${{ number_format($acc['price'], 2) }}
                        </p>
                        <a href="{{ route('payment.make', ['service_type' => $acc['title'], 'amount' => $acc['price'] * $exchangeRate]) }}" class="btn btn-primary mt-auto">Book & Pay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tourist Attractions Section -->
    <h3 class="my-5 text-center">Tourist Attractions</h3>
    <div class="row">
        @foreach ($attractions as $attraction)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('images/attractions/' . $attraction['slug'] . '/' . $attraction['image']) }}" class="card-img-top" alt="{{ $attraction['name'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $attraction['name'] }}</h5>
                        <p>{{ $attraction['description'] }}</p>
                        <p class="text-muted"><strong>Region:</strong> {{ $attraction['region'] }}</p>
                        <p>
                            <strong>Price:</strong> 
                            TSh {{ number_format($attraction['price_tzs']) }} |
                            ${{ number_format($attraction['price_usd'], 2) }}
                        </p>
                        <a href="{{ route('payment.make', ['service_type' => $attraction['name'], 'amount' => $attraction['price_tzs']]) }}" class="btn btn-primary mt-auto">Book & Pay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
