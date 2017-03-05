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

function getAllCourses(){
	$db = getDBConnection();
	$courses = [];
	if ($db != null){
		$sql = "SELECT distinct courseCode, courseName FROM `course`";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$courses[] = $row;
		}
		$db->close();
	}
	return $courses;
}

function getAllDeptCourses($departmentId){
	$db = getDBConnection();
	$deptcourses = [];
	if ($db != null){
		$sql = "SELECT distinct courseCode, courseName, departmentId FROM `course` WHERE `departmentId` = '$departmentId'";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$deptcourses[] = $row;
		}
		$db->close();
	}
	return $deptcourses;
}

function getAllDepartments(){
	$db = getDBConnection();
	$departments = [];
	if ($db != null){
		$sql = "SELECT departmentId FROM `department`";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$departments[] = $row;
		}
		$db->close();
	}
	return $departments;
}

function saveCourse($courseCode){
	$userId = $_SESSION['id'];
	$sql = "INSERT INTO `user_course` (`userId`, `courseCode`) VALUES ('$userId', '$courseCode')";
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

function getUserTable(){
	$userId = $_SESSION['id'];
	$sql = "SELECT c.courseCode, u.courseCode, courseName, roomId, sTime, fTime, day FROM course c JOIN user_course u ON u.courseCode = c.courseCode AND u.userId = $userId AND c.day = 'Monday' ORDER BY sTime ASC;";
	$table = [];
	$db = getDBConnection();
	if($db != NULL){
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$table[] = $row;
		}
		$db->close();
	}
	return $table;
}

?>
