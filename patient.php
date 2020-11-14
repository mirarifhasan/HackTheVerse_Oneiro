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
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="emergency-call">
            <h2>Emergency Call <i class="fas fa-bell"></i></h2>
            <form action="">
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
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
          <div class="line"></div>
          <div class="opload-voice-file">
            <h2>Send voice for covid test</h2>
            <form action="">
              <input type="file" id="myFile" name="filename"> <br><br>
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>
          <div class="line"></div>
          <div class="regular-report">
            <h2>Report</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">test name</th>
                  <th scope="col">value</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>11</td>

                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>11</td>

                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>11</td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="message-field">
            <div class="chat-text">
              <h3>Chat Box</h3>
            </div>
            <div class="container-field">
              <h5>Doctor</h5>
              <p>Hello. How are you today?</p>

            </div>

            <div class="container-field darker">
              <h5>Patient</h5>
              <p>Hey! I'm fine. Thanks for asking!</p>

            </div>

            <div class="container-field">
              <h5>Doctor</h5>
              <p>Sweet! So, what do you wanna do today?</p>

            </div>

            <div class="container-field darker">
              <h5>Patient</h5>
              <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>

            </div>
            <div class="msg-send-field">
              <form action="">
                <textarea name="" id="" rows="3"></textarea>
                <button type="submit" class="btn btn-primary">Post</button>
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