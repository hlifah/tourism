@extends('layouts.app')

@section('content')
<div class="container-fluid px-3" id="dashboard">
    <!-- Success message for profile update -->
    @if(session('success'))
        <div class="alert alert-success text-center mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card sidebar-card">
                <div class="card-header bg-dark text-white">
                    <strong>☰ Dashboard</strong>
                </div>
                <div class="list-group list-group-flush">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="toggleSection('profile')">1. Profile</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="toggleSection('payment')">2. Payment</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="toggleSection('password')">3. Change Password</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action" onclick="toggleSection('booking')">4. Make a Booking</a>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Welcome, {{ $user ? $user->name : 'Guest' }}</h4>

                <!-- Settings -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        ⚙️ Settings
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" id="toggleMode">Toggle Dark/Light Mode</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="card section-card mb-4" id="profile">
                <div class="card-header bg-primary text-white">1. Your Profile</div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Profile Picture -->
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <div class="mb-3">
                                    <img src="{{ Auth::check() && $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('images/default-profile.png') }}" alt="Profile Picture" class="rounded-circle" width="150px" height="150px">
                                </div>
                                <div class="mb-3">
                                    <label for="profile_picture" class="form-label">Change Profile Picture</label>
                                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="row mb-3">
                            <div class="col">
                                <label>Name</label>
                                <input name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="col">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Phone Number</label>
                                <input name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="col">
                                <label>Address</label>
                                <input name="address" class="form-control" value="{{ old('address', $user->address) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Sex</label>
                                <select name="sex" class="form-select">
                                    <option value="">Select...</option>
                                    <option value="male" {{ old('sex', $user->sex) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex', $user->sex) == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Place of Birth</label>
                                <input name="birth_place" class="form-control" value="{{ old('birth_place', $user->birth_place) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Booking Date</label>
                                <input type="date" name="booking_date" class="form-control" value="{{ old('booking_date', $user->booking_date) }}">
                            </div>
                            <div class="col">
                                <label>Work</label>
                                <input name="work" class="form-control" value="{{ old('work', $user->work) }}">
                            </div>
                        </div>
                        <button class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>

            <!-- Booking Section -->
            <div class="card section-card mb-4" id="booking" style="display:none;">
                <div class="card-header bg-info text-white">4. Make a Booking</div>
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="service_type">Service Type</label>
                                <select name="service_type" class="form-select" required>
                                    <option value="">Select Service...</option>
                                    <option value="hotel">Hotel</option>
                                    <option value="transport">Transport</option>
                                    <option value="tour">Tour Area</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="booking_date">Booking Date</label>
                                <input type="date" name="booking_date" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Make Booking</button>
                    </form>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="card section-card mb-4" id="payment" style="display:none;">
                <div class="card-header bg-success text-white">2. Payment Section</div>
                <div class="card-body">
                    <p>You have paid for <strong>{{ $user->services_paid_count ?? 0 }}</strong> services.</p>
                    <ul>
                        <li><a href="{{ route('accommodations') }}">Accommodations</a></li>
                        <li><a href="{{ route('attractions') }}">Tourist Attractions</a></li>
                        <li><a href="{{ route('payment.records') }}">View Payment Records</a></li>
                        <li><a href="{{ route('payment.structure') }}">Service Payment Structure</a></li>
                        <li><a href="{{ route('payment.make') }}">Make a Payment</a></li>
                    </ul>
                    <hr>

                    <h6>Request Control Number</h6>
                    <form action="{{ route('payment.request') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label>Service Type</label>
                            <select class="form-select" name="service_type" required>
                                <option value="">Choose...</option>
                                <option value="hotel">Hotel</option>
                                <option value="transport">Transport</option>
                                <option value="tour">Tour Area</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Amount</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <button class="btn btn-dark">Request Control Number</button>
                    </form>
                </div>
            </div>

            <!-- Password Section -->
            <div class="card section-card mb-4" id="password" style="display:none;">
                <div class="card-header bg-warning text-dark">3. Change Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.change') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>
                        <button class="btn btn-warning">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    document.getElementById('toggleMode').addEventListener('click', function () {
        document.body.classList.toggle('bg-dark');
        document.body.classList.toggle('text-white');

        document.querySelectorAll('.card').forEach(card => {
            card.classList.toggle('bg-dark');
            card.classList.toggle('text-white');
            card.classList.toggle('border-light');
        });

        document.querySelectorAll('input, select, textarea').forEach(input => {
            input.classList.toggle('bg-dark');
            input.classList.toggle('text-white');
        });

        localStorage.setItem('darkMode', document.body.classList.contains('bg-dark'));
    });

    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('bg-dark', 'text-white');
        document.querySelectorAll('.card').forEach(card => {
            card.classList.add('bg-dark', 'text-white', 'border-light');
        });
    }

    function toggleSection(section) {
        document.querySelectorAll('.section-card').forEach(function (card) {
            card.style.display = 'none';
        });
        document.getElementById(section).style.display = 'block';
    }

    toggleSection('profile');
</script>
@endsection
