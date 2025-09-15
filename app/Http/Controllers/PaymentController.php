<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Show the payment creation form
    public function create()
    {
        return view('payment.create');
    }

    // Store a new payment
    public function store(Request $request)
    {
        // Validate the payment data
        $request->validate([
            'service_type' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Generate a control number that starts with 99 and is unique
        $controlNumber = '99' . strtoupper(uniqid('', true));  // Generate a control number starting with '99'

        // Create the payment entry
        $payment = new Payment();
        $payment->user_id = Auth::id();  // Get the logged-in user's ID
        $payment->service_type = $request->service_type;
        $payment->amount = $request->amount;
        $payment->status = 'pending';  // Initially set to 'pending'
        $payment->control_number = $controlNumber;  // Set the generated control number
        $payment->payment_date = now();  // Set the payment date to the current time
        $payment->save();  // Save the payment to the database

        // Redirect back to the payment creation page with a success message
        return redirect()->route('payment.make')->with('success', 'Payment successfully submitted!');
    }

    // Show the user's payment records
    public function records()
    {
        // Get all payments related to the authenticated user
        $payments = Payment::where('user_id', Auth::id())->get();

        // Return the records view and pass the payments data to it
        return view('payment.records', compact('payments'));
    }

    // Show the payment structure
    public function structure()
    {
        // Here you can define the logic to show the payment structure (e.g., types of services and pricing structure)
        return view('payment.structure');  // You will need to create the structure view (resources/views/payment/structure.blade.php)
    }
}
