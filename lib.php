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

function saveUser($fname, $lname, $departmentId, $email, $password){
	$password = sha1($password);
	$sql = "INSERT INTO `user` (`fname`, `lname`, `departmentId`, `email`, `password`) VALUES ('$fname', '$lname', '$departmentId', '$email', '$password');";
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

function checkLogin($email, $password){
	$password = sha1($password);
	$sql = "SELECT * FROM `user` where `email`='$email'";
	//print($email);
	$db = getDBConnection();
	//print_r($db);
	if($db != NULL){
		$res = $db->query($sql);
		if ($res && $row = $res->fetch_assoc()){
			if($row['password'] == $password){
				$_SESSION["user"] = $row['fname'];
				$_SESSION["id"] = $row['userId'];
				return true;
			}
		}
	}
	return false;
}

?>
