<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a3f54;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            background-color: #f2f2f2;
        }

        .forgot-password {
            text-align: right;
            margin-top: -10px;
        }

        .forgot-password a {
            color: #999;
            text-decoration: none;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 3px;
            background-color: #2a3f54;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #406182;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Reset Kata Sandi</h2>
    <?php if (session()->getFlashdata('error')) : ?>
        <div><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')) : ?>
        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <div><?= $error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form action="<?= base_url('/reset-password') ?>" method="post">
        <div class="form-group">
            <input type="hidden" name="token" value="<?= $token ?>">
            <label for="password">Kata Sandi Baru:</label>
            <input type="password" name="password" required>
            <label for="password_confirm">Konfirmasi Kata Sandi Baru:</label>
            <input type="password" name="password_confirm" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Reset Kata Sandi" class="btn btn-primary" >
        </div>
    </form>
</div>
</body>
</html>
