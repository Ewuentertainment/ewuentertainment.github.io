<?php
$con = mysqli_connect('localhost', 'ewuent', 'ewuputty57', 'ewuent');

$username = $_POST["name"];
$password = $_POST["password"];

$namecheckquery = "SELECT username FROM user WHERE username='" . $username . "';";
$namecheck = mysqli_query($con, $namecheckquery) or die("1");

$salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
$hash = crypt($password, $salt);
$insertuserquery = "INSERT INTO user (username, hash, salt) VALUES ('" . $username . "', '" . $hash . "','" . $salt . "');";
mysqli_query($con, $insertuserquery) or die("2");
?>
