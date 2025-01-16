<!-- 
<div class="container" style="background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: #4CAF50;">Register</h2>
    <form method="POST" action="/register">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your full name" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        
        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Register</button>
    </form>
    <p style="text-align: center;">Already have an account? <a href="/login" style="color: #4CAF50; text-decoration: none;">Login here</a></p>
</div> -->

<div class="container" style="background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: #4CAF50;">Register</h2>
    
    <form method="POST" action="/register">
        <!-- Display general error (if any) -->
        <?php if (!empty($errors['general'])): ?>
            <p style="color: red;"><?= $errors['general'] ?></p>
        <?php endif; ?>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required 
               placeholder="Enter your full name" 
               value="<?= htmlspecialchars($data['name'] ?? '') ?>" 
               style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        <!-- Show error for fullname -->
        <?php if (!empty($errors['fullname'])): ?>
            <p style="color: red;"><?= $errors['fullname'] ?></p>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required 
               placeholder="Enter your email" 
               value="<?= htmlspecialchars($data['email'] ?? '') ?>" 
               style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        <!-- Show error for email -->
        <?php if (!empty($errors['email'])): ?>
            <p style="color: red;"><?= $errors['email'] ?></p>
        <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required 
               placeholder="Enter your password" 
               style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        <!-- Show error for password -->
        <?php if (!empty($errors['password'])): ?>
            <p style="color: red;"><?= $errors['password'] ?></p>
        <?php endif; ?>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required 
               placeholder="Confirm your password" 
               style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        <!-- Show error for confirm_password -->
        <?php if (!empty($errors['passwordConfirm'])): ?>
            <p style="color: red;"><?= $errors['passwordConfirm'] ?></p>
        <?php endif; ?>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">
            Register
        </button>
    </form>
    
    <p style="text-align: center;">Already have an account? 
        <a href="/login" style="color: #4CAF50; text-decoration: none;">Login here</a>
    </p>
</div>
