<?php

session_start();
	
function getDBConnection(){
	try{ 
		$db = new mysqli("localhost","root","","ifinddb");
		if ($db == null && $db->connect_errno > 0)return null;
		return $db;
	}catch(Exception $e){ } 
	return null;
}

function saveUser($fname, $lname, $deptId, $email, $password){
	$password = sha1($password);
	$sql = "INSERT INTO `user` (`fname`, `lname`, `email`, `password`,`departmentId`) VALUES ('$lname', '$lname', '$email', '$password', '$deptId');";
	$id = -1;
	$db = getDBConnection();
	if ($db != NULL){
		$res = $db->query($sql);
		if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
}

function login_check($email, $password){
	$password = sha1($password);
	$sql = "SELECT email, password 
            FROM user
			WHERE $email=email
			AND $password=password";
	$db = getDBConnection();
	if ($db != NULL){
		$res=$db->query($sql);	
		$row = mysqli_fetch_assoc($res);	
		if (($row["email"]==$email) && ($row["password"]==$password)){
			
		}
}

?>
