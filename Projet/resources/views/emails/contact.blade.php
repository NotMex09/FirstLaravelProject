<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            background: #f4f4f4;
            border-radius: 8px;
        }
        .header {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }
        .message {
            margin-top: 15px;
            background: #fff;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <p class="header">New Message from {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Mobile:</strong> {{ $data['mobile'] }}</p>
        <div class="message">
            <p><strong>Message:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
    </div>
</body>
</html>
