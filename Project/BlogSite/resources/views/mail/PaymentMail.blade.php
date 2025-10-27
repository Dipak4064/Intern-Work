<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }

        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Payment Confirmation</h1>
    </div>

    <div class="content">
        <p>Hello {{ $name }},</p>

        <p>Thank you for your payment. This email confirms that we have received your payment successfully.</p>

        <h3>Payment Details:</h3>
        <ul>
            <li><strong>Transaction ID:</strong> {{ $pid }}</li>
            <li><strong>Amount Paid:</strong> <span class="amount">${{ $amount }}</span></li>
            <li><strong>Payment Status:</strong> <span style="color:green;">{{ $messageStatus }}</span></li>
            <li><strong>Subscription for:</strong> {{ $plan }}</li>
        </ul>

        <p>If you have any questions regarding this payment, please don't hesitate to contact our support team.</p>

        <p>Best regards,<br>
            <b>Blog Site Team</b>
        </p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Blog Site. All rights reserved.</p>
    </div>
</body>

</html>