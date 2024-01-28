<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Email Title</title>
    <style>
        /* You can add custom styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $product->name }}</h1>
        </div>
        <div class="content">
            <p>Hello, {{ $user->name }}</p>
            <p>"Hey there! We're excited to introduce our latest product. It's packed with innovative features and designed to elevate your experience. Check it out now!"</p>
            {{-- <p>Here are some example content lines.</p> --}}
        </div>
        <div class="footer">
            <p>This Is Job Task By InsureCow &copy; 2024</p>
        </div>
    </div>
</body>
</html>
