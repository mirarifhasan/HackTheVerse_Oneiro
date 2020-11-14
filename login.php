<?php

include 'zzz-dbConnect.php';
session_start();

$email = '';
$error = '';

if (isset($_POST["login"])) {

	$email = trim($_POST["email"]);

	$sql = "SELECT * FROM user WHERE Email=?;";
	$stmt = mysqli_prepare($link, $sql);
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$noOfData = mysqli_num_rows($result);

	// If email found
	if ($noOfData == 1) {

		// If password correct
		$row = mysqli_fetch_assoc($result);
		if ($row['Password'] == $_POST['password']) {
			$_SESSION['UserID'] = $row['UserID'];
			$_SESSION['Name'] = $row['Name'];
			$_SESSION['Email'] = $row['Email'];
			$_SESSION['UserType'] = $row['UserType'];
			$_SESSION['Image'] = $row['Image'];
			$_SESSION['Rating'] = $row['Rating'];
			$_SESSION['Credit'] = $row['Credit'];

			header('Location: index');
		} else $error = "Wrong password";
	} else $error = "Email not exist";
}

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Account | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-9 col-sm-9 col-11">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<h4 class="account__title2">to continue in Boighor</h4>
							<div class="row">
								<div class="col-md-7">
									<form method="POST">
										<div class="account__form">
											<div class="input__box">
												<label>Email<span>*</span></label>
												<input type="email" name="email" value="<?php echo $email ?>" required>
											</div>
											<div class="input__box">
												<label>Password<span>*</span></label>
												<input type="password" name="password" value="<?php echo $password ?>" required>
											</div>
											<p class="text-danger" style="font-size: 13px;"><?php echo $error ?></p>
											<div style="display: flex">
												<div>
													<a class="forget_pass" href="#">Lost your password?</a>
													<a class="forget_pass" href="signup">Create new account</a>
												</div>
												<div class="form__btn align-self-center" style="position:absolute; right:35px;">
													<button type="submit" name="login">Log In</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-5 align-self-center d-none d-sm-none d-md-block">
									<img src="images/others/login.jpg" class="img-fluid" style="margin-left: -25px;" alt="picture">
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End My Account Area -->


	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>

</body>

</html>