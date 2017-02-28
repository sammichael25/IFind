<?php
include "lib.php";
$email = $_POST['email'];
$password=sha1 ($_POST['password']);
if (login_check($email, $password)==TRUE){
    $courses = getCourses($email,$password); //filling courses array                 
}
?>