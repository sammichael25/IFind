<?php
include "lib.php";
$email = $_POST['email'];
$password=sha1 ($_POST['password']);
login_check($email, $password);
?>