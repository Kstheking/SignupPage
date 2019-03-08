<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'loginData';
$con = mysqli_connect($servername,$username,$password,$db);
mysqli_select_db($con, $db);
$email = mysqli_real_escape_string($con,$_POST['email']);
$fullName = mysqli_real_escape_string($con,$_POST['fullName']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$dob = mysqli_real_escape_string($con,$_POST['dob']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$sql = "INSERT INTO loginDataTable (email, fullName, password, dob, gender)
VALUES ('$email', '$fullName', '$password', '$dob', '$gender')";
if (!mysqli_query($con, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>Welcome !</title>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 <!--===============================================================================================-->
 	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/submit.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
  </head>
  <body>
    <h1><i class="fas fa-flag"></i>  Welcome! <i class="fas fa-flag"></i></h1>
    <p>We are excited to have you here ! </p>
  </body>
