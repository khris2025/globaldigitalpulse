<!DOCTYPE html>
<html>
<head>
    <title>Deposit Notification</title>
    <style>
        /* Add your email styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
           
            margin: 0 auto;
            padding: 5px;
        }
        .logo {
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }
        .message {
            padding: 5px;
            background-color: #ffffff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- <img class="logo" src="https://dashboard.bright-waveholdinginc.com/public/assets/images/bit-blockdigital_images/logomain.png" alt="Company Logo"> --}}
        <div class="message">
            <h2>Deposit Notification</h2>
            <p>Hello {{ $user->name }},</p>
            <p>We are pleased to inform you that a deposit of ${{ number_format($deposit_amount) }} has been made to your account.</p>
            <p>Your updated account balance is now ${{ number_format($user->walletbalance) }}.</p>
            <p>Thank you for choosing our services!</p>
            <p>Sincerely,<br> BRIGHT WAVE HOLDING INC</p>
        </div>
    </div>
</body>
</html>

