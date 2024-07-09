<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlI8AM09LC79hi1U1kvbCKwkkv1p6PZfBX4oLUH-Yjf8AqXHcz0yaBonUTHiND5YV6kH4&usqp=CAU" alt="Company Logo">
        </div>
        <div class="message">
            <p>Dear {{ $ticket['customer_name'] }},</p>
            <p>Thank you for contacting us</p>
            <p>{{ $mailData['message'] }}</p>
            <p>Your reference number is: <strong>{{ $ticket['reference_number'] }}</strong></p>
        </div>
        <div class="footer">
            <p>If you have any questions, please contact us at support@elegantmedia.com</p>
        </div>
    </div>
</body>

</html>