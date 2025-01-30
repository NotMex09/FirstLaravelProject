<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 50px;
        }
        p {
            font-size: 20px;
            color: #666;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        .error-contenu {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            color: #333;
        }
        .GoBack:hover {
            border: 1px solid #db9f02;

        }
        .GoBack{
            border: 1px solid #3b3b3b;
            color: #daaa00;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            padding: 4PX 6PX;
            background-color: #1a2d34;
        }
        .p-error{
            font-size: 20px;
            color: #1a2d34;
        }
        .ErrorImage:hover{
            transform: scale(1.1) rotate(5deg);
                    }
        .ErrorImage{
            width:300PX;
            transition: transform 0.3s ease, opacity 0.3s ease;

        }
    </style>
</head>
<body>
<div class="error-contenu">
        <a href="/"><img class="ErrorImage" ref="/" src="/uploads/error.png" alt="Error_404" width="300px"></a>
        <p class="p-error"><strong>We were not able to find the page you're looking for.</strong></p>
        <p ><a href="/" class="GoBack">Go home</a></p>
    </div>
</body>
</html>
