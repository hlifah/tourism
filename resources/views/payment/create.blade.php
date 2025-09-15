<!-- resources/views/payment/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Payment Form</h1>

        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="service_type" class="form-label">Service Type</label>
                <select name="service_type" class="form-select" required>
                    <option value="hotel">Hotel</option>
                    <option value="transport">Transport</option>
                    <option value="tour">Tour Area</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
