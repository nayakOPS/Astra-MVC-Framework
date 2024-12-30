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
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar: Shared across all pages -->
    <div class="navbar">
        <a href="/">Home</a>
        <a href="/contact">Contact</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>

    <!-- Main Content: This will be replaced by the page content -->
    <div class="container">
        {{content}}
    </div>

    <!-- Footer: Shared across all pages -->
    <footer>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
