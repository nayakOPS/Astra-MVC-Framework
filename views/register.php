<!-- register.php -->
<h2>Register</h2>
<form method="POST" action="/register">
    <div style="margin-bottom: 15px;">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your full name" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password" style="width: 100%; padding: 10px;">
    </div>
    <div style="margin-bottom: 15px;">
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none;">Register</button>
    </div>
</form>
<p>Already have an account? <a href="/login">Login here</a></p>
