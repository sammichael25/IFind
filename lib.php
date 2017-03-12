<?php
include "course.php";
if(!session_id()) session_start();//If session is not started start session

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

function deleteCourse($courseCde){
	$userId = $_SESSION['id'];
	$db = getDBConnection();
	
	$sql = "DELETE FROM `user_course` WHERE `courseCode` = '$courseCde' AND `userId` = '$userId'";
	$res = null;
	if($db!= Null){
		$res = $db->query($sql);
		$db->close();
	}
	return $res;
}

function getAllUserCourses(){
	$userId = $_SESSION['id'];
	$db = getDBConnection();
	$courses = [];
	if ($db != null){
		$sql = "SELECT userId, courseCode FROM `user_course` WHERE userId=$userId";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$courses[] = $row;
		}
		$db->close();
	}
	return $courses;
}


function genTimetable(){ //retrieving courses to generate the timetable for the user 
$userId = $_SESSION['id'];	
$db = getDBConnection();
$sql = "SELECT c.courseCode, u.courseCode, courseName, roomId, sTime, fTime, day FROM course c JOIN user_course u ON u.courseCode = c.courseCode AND u.userId = $userId";
$empty= new Course(); //empty course object
$courses = array( //associative 2D array using Days and Time as the indices
            "08:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
			"09:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
			"10:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
			"11:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
			"12:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "13:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "14:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "15:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "16:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "17:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "18:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            "19:00:00" => array (
               "Monday"=>$empty,
               "Tuesday"=>$empty,	
               "Wednesday"=>$empty,
               "Thursday"=>$empty,
               "Friday"=>$empty,
               "Saturday"=>$empty,
            ),
            
);
 $res=$db ->query($sql);
    while(($row = $res ->fetch_assoc())!=null){ //fetching course information row by row
       $course=new Course(); //creating course object
       $course->courseCode =$row["courseCode"]; //course code from course table added to course object
       $course->courseName =$row["courseName"]; //name of course from course table added to course object
       $course->sTime = $row["sTime"]; //start time of course from course table added to course object
       $course->fTime =$row["fTime"]; //finish time of course from course table added to course object
       $course->day =$row["day"]; //day course is held from course table added to course object
       $course->roomId =$row["roomId"]; //room where course is taught from course table added to course object

	   $courses[$course->sTime][$course->day]=$course; 
       if ($course->fTime - $course->sTime === 2){ //checks if course session is two hours; no checks if course is >2 hours
           $new_time = (($course->sTime) +1).":00:00"; //if true then add hour unto another hour
           $courses[$new_time][$course->day]=$course;
       }
	}
	//echo $courses['09:00:00']['Monday']->courseCode;
    $time_intervals=['8am-9am','9am-10am','10am-11am','11am-12pm','12pm-1pm','1pm-2pm','2pm-3pm','3pm-4pm','4pm-5pm','5pm-6pm','6pm-7pm','7pm-8pm'];//index array by default
	$i=0;
    echo "<table class='table table-hover table-responsive' id='dev-table' style='table-layout:fixed'";
    echo "<thead><tr><th>&nbsp;</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></thead></tr>";
	foreach($courses as $list => $times) //printing timetable row by row
	{
		echo "<tr><td>".$time_intervals[$i++]."</td>"; //i need to iterate all these times
    foreach($times as $days => $value){
		//echo $value->courseCode;
		echo "<td>".$value->courseCode."<br>".$value->courseName."<br>"."<a href='map.php?roomID=".$value->roomId."'>".$value->roomId."</a>"."</td>"; //roomId is hyperlinked and sent as variable to google map page
	}
	echo "</tr>";
	}
	echo "</table>";
}

function retrieveGPS($roomID){ 
//echo "<h1>".$_GET['roomID']."</h1>";

$sql= "SELECT gpsLat, gpsLng
       FROM building
       JOIN room
       ON building.buildingId = room.buildingId
       AND room.roomID = '$roomID'
       "; //statement to retrieve gps coordinates of building

$db = getDBConnection(); //lib.php included for this method to work
$result=$db->query($sql);
while ($row=$result->fetch_assoc()){
  $gpsLat=$row["gpsLat"]; //storing latitude of the building table into variable gpsLat
  $gpsLng=$row["gpsLng"]; //storing latitude of the building table into variable gpsLng
}
return array('gpsLat'=> $gpsLat,'gpsLng' => $gpsLng);
}
// echo $gpsLat;
// echo $gpsLng;

?>
