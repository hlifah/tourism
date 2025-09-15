<!-- resources/views/payment/records.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Payment Records</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($payments->isEmpty())
            <p>You have no payment records yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Service Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Control Number</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->service_type }}</td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>{{ $payment->control_number }}</td>
                            <td>{{ $payment->payment_date->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
