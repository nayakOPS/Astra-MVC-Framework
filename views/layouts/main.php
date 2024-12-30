<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra Framework</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #444;
        }
        .navbar {
            background-color: #4CAF50;
            overflow: hidden;
            padding: 10px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
        }
        .navbar a:hover {
            background-color: #45a049;
        }
        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 10px;
        }
        .container {
            padding: 20px;
        }
        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>

    <!-- Header -->
    <div class="header">
        <h1>Astra Framework</h1>
        <p>A lightweight and easy-to-use MVC framework for learning and experimentation.</p>
    </div>

    <!-- Main Content -->
    <div class="container">
        {{content}}
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Astra Framework. Built for learning MVC architecture.</p>
    </footer>
</body>
</html>
