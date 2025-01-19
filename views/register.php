<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Astra Framework</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #fff;">
    <div style="margin: 20px auto; max-width: 800px; padding: 20px;">
        <h1 style="text-align: center; color: #00c853;">Register</h1>
        
        <?php $form = \app\core\form\Form::begin('', 'post') ?>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Fullname:</label>
                <div style="margin-bottom: 15px;">
                    <?php echo str_replace('class="form-control"', 'style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 14px;"', $form->field($model, 'fullname')) ?>
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Email:</label>
                <div style="margin-bottom: 15px;">
                    <?php echo str_replace('class="form-control"', 'style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 14px;"', $form->field($model, 'email')) ?>
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Password:</label>
                <div style="margin-bottom: 15px;">
                    <?php echo str_replace('class="form-control"', 'style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 14px;"', $form->field($model, 'password')->passwordField()) ?>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Confirm Password:</label>
                <div style="margin-bottom: 15px;">
                    <?php echo str_replace('class="form-control"', 'style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 14px;"', $form->field($model, 'passwordConfirm')->passwordField()) ?>
                </div>
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #00c853; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Register</button>
        <?php \app\core\form\Form::end() ?>
        
        <p style="text-align: center; margin-top: 15px;">
            Already have an account? <a href="/login" style="color: #00c853; text-decoration: none;">Login here</a>
        </p>
    </div>
</body>
</html>