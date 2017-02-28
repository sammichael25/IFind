<?php
session_start();

    echo "<link href='css/bootstrap.min.css' rel='stylesheet'>";
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
	$sql = "SELECT `email`, `password` 
            FROM `user`
			WHERE '$email'=`email`
			AND '$password'=`password`
			";

	$db = getDBConnection();
	$result=mysqli_query($db,$sql) or die(mysqli_error($db));
	if(mysqli_num_rows($result) == 1 ){//condition for timetable to be generated for the user
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function getCourses($email,$password){
include "course.php";
$conn = new mysqli("localhost","root","","ifinddb");
$sql = "SELECT courseCode, courseName, sTime, fTime, day, roomId
        FROM course
        WHERE courseCode in(SELECT courseCode
        FROM user_course
        INNER JOIN user
        on (user_course.userId = user.userId)
        WHERE user.email='$email'
        AND user.password='$password'
        )
            ";
$empty= new Course();
$courses = array( 
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
            )
);
 $res=$conn ->query($sql);
    while(($row = $res ->fetch_assoc())!=null){
       $course=new Course(); //creating course object
       $course->courseCode =$row["courseCode"];
       $course->courseName =$row["courseName"];
       $course->sTime = (string)$row["sTime"];
       $course->fTime =(string)$row["fTime"];
       $course->day =$row["day"];
       $course->roomId =$row["roomId"];

	   $courses[(string)$course->sTime][(string)$course->day]=$course;
	}
	//echo $courses['09:00:00']['Monday']->courseCode;
	echo "<table class='table table-hover' id='dev-table'>";
	foreach($courses as $list => $times)
	{
		echo "<tr>";
    foreach($times as $days => $value){
		//echo $value->courseCode;
		echo "<td>".$value->courseCode."</td>";
	}
	echo "</tr>";
	}
	echo "</table>";
}

?>
