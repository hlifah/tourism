<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Explore Tanzania</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }
        .hero {
            background-image: url('/images/hero/tanzania_hero.jpg'); /* Ensure this file exists in public/images/hero/ */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .card img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }
        .card img:hover {
            transform: scale(1.05);
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
        .card:hover {
            transform: scale(1.03);
            transition: 0.3s ease-in-out;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Explore Tanzania</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('accommodations') }}">Accommodations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('attractions') }}">Tourist Attractions</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
            </ul>
        </div>
        <div class="d-flex">
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-light">Register</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero text-center">
    <h1 class="display-3 fw-bold">Discover Tanzania</h1>
    <p class="lead">Explore the beauty, culture, and adventures of Tanzania</p>
</div>

<!-- Accommodations Preview -->
<div class="container my-5">
    <h2 class="text-center mb-4">Top Accommodations</h2>
    <div class="row">
        @foreach([
            ['name' => 'Serena Hotel', 'image' => 'serena/front.jpg', 'desc' => 'Luxury hotel in Dar es Salaam with beachfront and cultural tours.', 'location' => 'Dar es Salaam'],
            ['name' => 'Ngorongoro Lodge', 'image' => 'ngorongoro/view.jpg', 'desc' => 'Overlooking the Ngorongoro Crater with wildlife at your doorstep.', 'location' => 'Ngorongoro Conservation Area'],
            ['name' => 'Zanzibar Beach Resort', 'image' => 'zanzibar/beach.jpg', 'desc' => 'Tropical getaway with white sand beaches and turquoise water.', 'location' => 'Zanzibar']
        ] as $acc)
        <div class="col-md-4 mb-4">
            <div class="card accommodation-card">
                <a href="/images/accommodations/{{ $acc['image'] }}" data-lightbox="accommodations" data-title="{{ $acc['name'] }}">
                    <img src="/images/accommodations/{{ $acc['image'] }}" class="card-img-top" alt="{{ $acc['name'] }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $acc['name'] }}</h5>
                    <p class="card-text">{{ $acc['desc'] }}</p>
                    <p class="text-muted"><strong>Location:</strong> {{ $acc['location'] }}</p>
                    <a href="{{ route('accommodations') }}" class="btn btn-outline-primary btn-sm">More Info</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Attractions Preview -->
<div class="container my-5">
    <h2 class="text-center mb-4">Top Tourist Attractions</h2>
    <div class="row">
        @foreach([
            ['name' => 'Serengeti National Park', 'image' => 'serengeti/lions.webp', 'desc' => 'Home to the Great Migration and the Big Five.', 'location' => 'Northern Tanzania'],
            ['name' => 'Mount Kilimanjaro', 'image' => 'kilimanjaro/peak.jpg', 'desc' => 'Climb Africa’s highest peak for an unforgettable adventure.', 'location' => 'Kilimanjaro Region'],
            ['name' => 'Stone Town', 'image' => 'stone-town/doors.jpg', 'desc' => 'Historic town with a blend of African, Arab, and European cultures.', 'location' => 'Zanzibar']
        ] as $att)
        <div class="col-md-4 mb-4">
            <div class="card attraction-card">
                <a href="/images/attractions/{{ $att['image'] }}" data-lightbox="attractions" data-title="{{ $att['name'] }}">
                    <img src="/images/attractions/{{ $att['image'] }}" class="card-img-top" alt="{{ $att['name'] }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $att['name'] }}</h5>
                    <p class="card-text">{{ $att['desc'] }}</p>
                    <p class="text-muted"><strong>Area:</strong> {{ $att['location'] }}</p>
                    <a href="{{ route('attractions') }}" class="btn btn-outline-primary btn-sm">More Info</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Contact Section -->
<div class="container my-5" id="contact">
    <h2 class="text-center mb-4">Contact Us</h2>
    <p class="text-center">Questions? Email us at <a href="asma@gmail.com">info@exploretanzania.com</a></p>
</div>

<!-- Footer -->
<footer class="footer text-center py-4 bg-light">
    &copy; {{ date('Y') }} Explore Tanzania. All rights reserved.
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
</body>
</html>
