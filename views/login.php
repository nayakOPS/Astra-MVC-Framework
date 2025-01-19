<div class="container" style="background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: #4CAF50;">Login</h2>
    <form method="POST" action="/login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Login</button>
    </form>
    <p style="text-align: center;">Don't have an account? <a href="/register" style="color: #4CAF50; text-decoration: none;">Register here</a></p>
</div>