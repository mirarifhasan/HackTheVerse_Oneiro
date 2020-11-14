<?php

include 'zzz-dbConnect.php';
session_start();

$_SESSION['doctor_id'] = '';
$_SESSION['doctor_name'] = '';
$error = '';

if (isset($_POST["submit"])) {
    if ($_POST["phone"] != '01234567890' || $_POST["password"] != '123456') {
        $error = 'Wrong phone/password';
        echo "<script type='text/javascript'>alert('$error');</script>";
    } else {
        $_SESSION['doctor_id'] = 0;
        $_SESSION['doctor_name'] = 'Dr. Kabir Chow.';
        header('Location: doctor-dashboard');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Oneiro</title>

    <!-- CSS link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

    <div class="sign-up-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-title">
                        <h2>Doctor Login Portal</h2>
                    </div>
                    <form method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="disabledTextInput">Phone Number</label>
                                <input type="tel" name="phone" value="01234567890" id="disabledTextInput" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Password</label>
                                <input type="password" name="password" value="123456" id="disabledTextInput" class="form-control" placeholder="">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            <p style="margin-top:10px"><a href="login">Login as Patient</a></p>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>






















    <!-- JS link -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>