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
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputname4">Name</label>
            <input type="text" class="form-control" id="inputname4" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputnumber4">Age</label>
            <input type="number" class="form-control" id="inputnumber4" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity" style="margin-right: 20px;">Genger</label>
            <select name="dept" style="width: 100%;">
              <option value="" disabled selected>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputphone">Phone Number</label>
            <input type="tel" class="form-control" id="inputphone" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" required>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>






















  <!-- JS link -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>