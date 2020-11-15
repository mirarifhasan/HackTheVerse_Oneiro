<?php

include 'zzz-dbConnect.php';
session_start();


if (!isset($_SESSION['name']) || $_SESSION['name']=='') {
  header('Location: login');
}


if (isset($_POST["soscall"])) {

  $sql = "INSERT INTO sos (patient_id, task) VALUES ('" . $_SESSION['patient_id'] . "', 'Emergency SOS Call')";

  mysqli_query($link, $sql);
  
  $s = $_SESSION["name"];
  header("Location: send-email?e=$s");
  echo "<script type='text/javascript'>alert('SOS send');</script>";
}


if (isset($_POST["submit"])) {
  if (trim($_POST["text"]) != '') {

    $sql = "INSERT INTO chat (sender, receiver, text) VALUES ('" . $_SESSION["pid"] . "', '0', '" . trim($_POST["text"]) . "')";
  
    mysqli_query($link, $sql);
    header("Refresh:0");
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oneiro</title>

  <!-- CSS link -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

  <div class="patient-interphase">
    <div class="menu-bar">
      <ul class="nav justify-content-end">

        <?php
        if ($_SESSION['patient_id'] == '') {
        ?>
          <li><a href="login">Login</a></li>
          <li><a href="signup.php">Signup</a></li>
        <?php } else {
          echo '<p style="color:white; padding-right:30px;">' . $_SESSION["name"] . '</p>';
          echo '<li><a href="logout">Logout</a></li>';
        }  ?>
      </ul>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="emergency-call">
            <h2>Emergency SOS Call <i class="fas fa-bell"></i></h2>
            <form method="POST">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  High Fever
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck2">
                  Dyspnoea
                </label>
              </div>
              <button type="submit" name="soscall" class="btn btn-primary">Send</button>
            </form>
          </div>

          <div class="line"></div>

          <div class="opload-voice-file">
            <h2>Send voice clip for COVID test</h2>
            <form action="file-upload" method="POST" enctype="multipart/form-data">
              <input type="file" id="myFile" name="file"> <br><br>
              <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>

          <?php
          $sql = 'SELECT * FROM audio WHERE patient_id = ' . $_SESSION['patient_id'] . ' ORDER BY audio_id DESC LIMIT 1';
          $res1 = mysqli_query($link, $sql);
          $noOfData = mysqli_num_rows($res1);
          if ($noOfData > 0) {
          ?>
            <h4 style="color:blue; margin-top:20px">
              Latest COVID caugh report in
              <?php
              $row1 = mysqli_fetch_assoc($res1);
              if ($row1['iscovid'] == 1) {
                echo 'POSITIVE';
              } else echo 'NEGATIVE';
              ?>
            </h4>
          <?php
          }
          ?>

          <h4 style="padding-top: 15px;">Previous audios</h4>

          <?php
          $sql = 'select * from audio where patient_id=' . $_SESSION['patient_id'];
          $res1 = mysqli_query($link, $sql);
          while ($row1 = mysqli_fetch_assoc($res1)) { ?>
            <div class="col-md-12">
              <audio src="<?php echo $row1['path'] ?>" controls>
                Your browser does not support the audio element.
              </audio>
            </div>
          <?php } ?>

          <div class="line"></div>

          <div class="regular-report">
            <h2>Report [BP]</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Date Time</th>
                  <th scope="col">High</th>
                  <th scope="col">Low</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'select * from bp where patient_id=' . $_SESSION['patient_id'];
                $res1 = mysqli_query($link, $sql);
                while ($row1 = mysqli_fetch_assoc($res1)) { ?>
                  <tr>
                    <th scope="row"><?php echo $row1['datetime'] ?></th>
                    <td><?php echo $row1['high'] ?></td>
                    <td><?php echo $row1['low'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="message-field">
            <div class="chat-text">
              <h3>Chat Box</h3>
            </div>



            <?php
            $sql = 'SELECT * FROM chat WHERE sender=' . $_SESSION['patient_id'] . ' or receiver=' . $_SESSION['patient_id'];

            $res1 = mysqli_query($link, $sql);
            while ($row1 = mysqli_fetch_assoc($res1)) {
              if ($row1['sender'] == 0) {
            ?>
                <div class="container-field">
                  <h5>Doctor</h5>
                  <p><?php echo $row1['text'] ?></p>
                </div>
              <?php
              } else {
              ?>
                <div class="container-field darker">
                  <h5>Patient</h5>
                  <p><?php echo $row1['text'] ?></p>
                </div>
              <?php
              }
              ?>
            <?php } ?>


            <div class="msg-send-field">
              <form method="POST">
                <textarea name="text" id="" rows="3"></textarea>
                <button type="submit" name="submit" class="btn btn-primary">Post</button>
              </form>
            </div>
          </div>
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