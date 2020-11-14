<?php

include 'zzz-dbConnect.php';
session_start();

if ( $_SESSION['doctor_id']!=0 || $_SESSION['doctor_name']=='') {
  header('Location: doctor-login');
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
  <div class="doctor-interphase">

    <div class="menu-bar">
      <ul class="nav justify-content-end">
        <p style="padding-right: 20px; color:white"><?php echo $_SESSION['doctor_name'];?></p>
        <li><a class="bg-warning" href="hotspot-zone"><b>Heat map</b></a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="emergency-output-title">
            <h2 class="bg-warning">SOS Patients</h2>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Details</th>
                <th scope="col">Profile</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = 'SELECT patient.patient_id, patient.name, sos.task FROM `sos` join patient on sos.patient_id=patient.patient_id ';
              $res1 = mysqli_query($link, $sql);
              $noOfData = mysqli_num_rows($res1);
              while ($row1 = mysqli_fetch_assoc($res1)) {
              ?>
                <tr>
                  <th scope="row"><?php echo $row1['patient_id'] ?></th>
                  <td><?php echo $row1['name'] ?></td>
                  <td><?php echo $row1['task'] ?></td>
                  <td><a href="patient-details?pid=<?php echo $row1['patient_id'] ?>">Details</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>


        <div class="col-md-6">
          <div class="emmergency-patient">
            <div class="em-pat-title">
              <h2>Risk Patients [on BP]</h2>
            </div>
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">Patient No.</th>
                  <th scope="col">Patient Name</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'select * from patient';
                $res1 = mysqli_query($link, $sql);
                while ($row1 = mysqli_fetch_assoc($res1)) {

                  $sql = 'SELECT patient.patient_id, patient.name, bp.high, bp.low FROM `bp` join patient on bp.patient_id = patient.patient_id WHERE patient.patient_id = ' . $row1['patient_id'];
                  $result = mysqli_query($link, $sql);
                  $sum = 0;
                  $noOfData = mysqli_num_rows($result);
                  if ($noOfData > 0) {
                    while ($row2 = mysqli_fetch_assoc($result)) {
                      $sum = $sum + abs(120 - $row2['high']);
                    }
                    if ($sum / $noOfData > 2) {
                ?>
                      <tr>
                        <th scope="row"><?php echo $row1['patient_id'] ?></th>
                        <td><?php echo $row1['name'] ?></td>
                        <td><a href="patient-details?pid=<?php echo $row1['patient_id'] ?>">Details</a></td>
                      </tr>
                <?php }
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>


        <div class="col-md-6">
          <div class="patients-data">
            <div class="pat-data-title">
              <h2>Patient List</h2>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Patient No.</th>
                  <th scope="col">Patient Name</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'select * from patient';
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $row['patient_id'] ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><a href="patient-details?pid=<?php echo $row['patient_id'] ?>">Details</a></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
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