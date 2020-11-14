<?php

include 'zzz-dbConnect.php';
session_start();

$_SESSION["name"] = '';
$_SESSION['age'] = '';
$_SESSION["phone"] = '';
$_SESSION['address'] = '';
$_SESSION['city'] = '';
$_SESSION["gender"] = '';
$_SESSION["password"] = '';
$_SESSION["c_password"] = '';
$error = '';

if (isset($_POST["signup"])) {
  $_SESSION['name'] = trim($_POST["name"]);
  $_SESSION['age'] = trim($_POST["age"]);
  $_SESSION['phone'] = trim($_POST["phone"]);
  $_SESSION['address'] = trim($_POST["address"]);
  $_SESSION['city'] = trim($_POST["city"]);
  $_SESSION['gender'] = trim($_POST["gender"]);
  $_SESSION['password'] = trim($_POST["password"]);
  $_SESSION['c_password'] = trim($_POST["c_password"]);

  $sql = "select * from patient where phone='" . $_SESSION['phone'] . "'";
  $result = mysqli_query($link, $sql);
  $noOfData = mysqli_num_rows($result);

  if ($noOfData > 0) {
    $error = 'This phone number already exist';
    echo "<script type='text/javascript'>alert('$error');</script>";
  } elseif ($error == '' && ($_SESSION['password'] == $_SESSION['c_password'])) {
    $sql = "INSERT INTO patient (name, gender, age, phone, address, city, password) VALUES ('" . $_SESSION['name'] . "', '" . $_SESSION['gender'] . "', '" . $_SESSION['age'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['address'] . "', '" . $_SESSION['city'] . "', '" . $_SESSION['password'] . "')";
    mysqli_query($link, $sql);

    $sql = "select * from patient where phone='" . $_SESSION['phone'] . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['patient_id'] = $row['patient_id'];
    header('Location: patient');
  } else {
    $error = 'Password not match.';
    echo "<script type='text/javascript'>alert('$error');</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup | Oneiro</title>

  <!-- CSS link -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

  <div class="sign-up-form">
    <div class="container">
      <div class="form-title">
        <h2>Patient Information</h2>
      </div>
      <form method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputname4">Name</label>
            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" class="form-control" id="inputname4" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputnumber4">Age</label>
            <input type="number" name="age" value="<?php echo $_SESSION['age']; ?>" class="form-control" id="inputnumber4" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity" style="margin-right: 20px;">Genger</label>
            <select name="gender" style="width: 100%;" required>
              <option value="" disabled selected>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputphone">Phone Number</label>
            <input type="tel" name="phone" value="<?php echo $_SESSION['phone']; ?>" class="form-control" id="inputphone" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" class="form-control" id="inputAddress" placeholder="" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" class="form-control" id="inputCity" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Password</label>
            <input type="text" name="password" value="<?php echo $_SESSION['password']; ?>" class="form-control" id="inputAddress" placeholder="" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">Confirm Password</label>
            <input type="text" name="c_password" value="<?php echo $_SESSION['c_password']; ?>" class="form-control" id="inputCity" required>
          </div>
        </div>

        <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>






















  <!-- JS link -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>