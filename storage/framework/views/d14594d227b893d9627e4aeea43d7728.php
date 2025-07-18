<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Link</title>
    <style>
        /* Add your email styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            max-width: 150px;
            display: block;
            margin: 0 auto;
        }
        .message {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="message">
            <h2>Password Reset Link</h2>
            <p>Hello <?php echo e($user->fullname); ?>,</p>
            <p>You've requested a password reset for your account. Click the button below to reset your password:</p>
            <p><a class="button" href="<?php echo e(route('confirm_password_token', ['token' => $token])); ?>">Reset Password</a></p>
            <p>If you did not request a password reset, no further action is required.</p>
            <p>Thank you for choosing our services!</p>
            <p>Sincerely,<br> BRIGHT WAVE HOLDING INC</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/emails/reset_password.blade.php ENDPATH**/ ?>