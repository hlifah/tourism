<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\BookingController;

// Default Route (Home)
Route::get('/', function () {
    return view('welcome');
});

// Attractions Routes
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions');
Route::get('/attractions/{name}', [AttractionController::class, 'show'])->name('attractions.show');

// Accommodations Routes
Route::get('/accommodations', [AccommodationController::class, 'index'])->name('accommodations');
Route::get('/accommodations/{name}', [AccommodationController::class, 'show'])->name('accommodations.show');

// Authentication Routes
Auth::routes();

// Redirect /home to /dashboard
Route::get('/home', fn() => redirect()->route('dashboard'));

// Routes only accessible to logged-in users
Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Update Route
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Password Change Routes
    Route::get('/password/change', [PasswordController::class, 'showChangeForm'])->name('password.change.form');
    Route::post('/password/change', [PasswordController::class, 'change'])->name('password.change');

    // Payment Routes
    Route::get('/payment/records', [PaymentController::class, 'records'])->name('payment.records');
    Route::get('/payment/structure', [PaymentController::class, 'structure'])->name('payment.structure');
    Route::get('/payment/make', [PaymentController::class, 'create'])->name('payment.make');
    Route::post('/payment/request', [PaymentController::class, 'store'])->name('payment.request');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

   
    // Booking Routes
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
});
