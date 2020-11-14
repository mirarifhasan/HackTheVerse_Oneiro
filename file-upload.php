<?php

include 'zzz-dbConnect.php';
session_start();



if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('mp3','MP3');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
               $fileNameNew = uniqid('',true).".".$fileActualExt;
               $fileDestination = 'uploads/'.$fileNameNew;
               move_uploaded_file($fileTmpName, $fileDestination );

               $sql = "INSERT INTO audio (patient_id, path, iscovid) VALUES ('" . $_SESSION['patient_id'] . "', '" . $fileDestination . "', '1')";
               mysqli_query($link, $sql);
               

               header("Location: patient-profile");
               echo "<script type='text/javascript'>alert('Uploaded');</script>";
        }else{
            echo "There is an error uploading your file!";
        }
    }else{
        echo "You cannot upload files of this type!";
    }
}
?>