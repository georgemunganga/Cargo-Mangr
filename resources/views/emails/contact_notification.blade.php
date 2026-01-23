<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: #0073e6;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            border-radius: 8px 8px 0 0;
        }
        .email-content {
            padding: 20px;
            color: #333333;
            font-size: 16px;
        }
        .email-content p {
            margin: 10px 0;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            📩 New Contact Message
        </div>
        <div class="email-content">
            <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
            <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
            <p><strong>Message:</strong></p>
            <p style="background: #f8f8f8; padding: 10px; border-left: 4px solid #0073e6;">
                {{ $contactData['message'] }}
            </p>
        </div>
        <div class="email-footer">
            This message was sent from your website contact form.
        </div>
    </div>
</body>
</html>
