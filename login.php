<?php

include 'zzz-dbConnect.php';
session_start();

// $_SESSION['patient_id'] = '';
// $_SESSION["name"] = '';
// $_SESSION['age'] = '';
// $_SESSION["phone"] = '';
// $_SESSION['address'] = '';
// $_SESSION['city'] = '';
// $_SESSION["gender"] = '';
// $_SESSION["password"] = '';
// $_SESSION["c_password"] = '';
$error = '';

if (isset($_POST["submit"])) {
  $_SESSION['phone'] = trim($_POST["phone"]);
  $_SESSION['password'] = trim($_POST["password"]);

  $sql = "select * from patient where phone='" . $_SESSION['phone'] . "' and password='" . $_SESSION['password'] . "'";

  $result = mysqli_query($link, $sql);
  $noOfData = mysqli_num_rows($result);

  if ($noOfData == 0) {
    $error = 'Wrong phone/password';
    echo "<script type='text/javascript'>alert('$error');</script>";
  } else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['patient_id'] = $row['patient_id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['gender'] = $row['gender'];
    header('Location: patient-profile');
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
    <div class="menu-bar">
      <ul class="nav justify-content-end">
        <li><a href="signup.php">Signup</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-title">
            <h2>Patient Login Portal</h2>
          </div>
          <form method="post">
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Phone Number</label>
                <input type="tel" name="phone" value="<?php echo $_SESSION['name']; ?>" id="disabledTextInput" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="disabledTextInput">Password</label>
                <input type="text" name="password" value="<?php echo $_SESSION['password']; ?>" id="disabledTextInput" class="form-control" placeholder="">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Login</button>
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