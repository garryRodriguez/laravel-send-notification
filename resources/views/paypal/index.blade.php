<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Payment</title>
</head>
<body>
    <h1>PayPal Payment Page</h1>
    <p>Proceed with the payment.</p>

    <form action="{{ url('paypal/create') }}" method="POST">
        @csrf
        <button type="submit">Pay with PayPal</button>
    </form>
</body>
</html>
