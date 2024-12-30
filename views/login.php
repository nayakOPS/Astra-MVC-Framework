<!-- login.php -->
<h2>Login</h2>
<form method="POST" action="/login">
    <div style="margin-bottom: 15px;">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none;">Login</button>
    </div>
</form>
<p>Don't have an account? <a href="/register">Register here</a></p>
