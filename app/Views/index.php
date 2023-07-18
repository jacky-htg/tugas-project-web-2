<!-- reCAPTCHA JS-->
<script src="https://www.google.com/recaptcha/api.js?render=<?= getenv('GOOGLE_RECAPTCHAV2_SITEKEY') ?>"></script>

<!--Membuat Tampilan-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Google reCAPTCHA v2 in CodeIgniter 4</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" >

    <!-- reCAPTCHA JS-->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= getenv('GOOGLE_RECAPTCHAV2_SITEKEY') ?>"></script>

    <!-- Include script -->
    <script type="text/javascript">

    function onSubmit(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
             grecaptcha.execute("<?= getenv('GOOGLE_RECAPTCHAV2_SITEKEY') ?>", {action: 'submit'}).then(function(token) {

                  // Store recaptcha response
                  document.getElementById("recaptcha_response").value = token;

                  // Submit form
                  document.getElementById("contactForm").submit();

             });
        });
    }

    </script>
</head>
<body>