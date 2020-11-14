<?php

include 'zzz-dbConnect.php';
session_start();

$_SESSION['patient_id'] = '';
$_SESSION["name"] = '';
$_SESSION['age'] = '';
$_SESSION["phone"] = '';
$_SESSION['address'] = '';
$_SESSION['city'] = '';
$_SESSION["gender"] = '';
$_SESSION["password"] = '';
$_SESSION["c_password"] = '';
$error = '';
header('Location: login');
?>