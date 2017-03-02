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
 $res=$conn ->query($sql);
    while(($row = $res ->fetch_assoc())!=null){
       $course=new Course(); //creating course object
       $course->courseCode =$row["courseCode"];
       $course->courseName =$row["courseName"];
       $course->sTime = $row["sTime"];
       $course->fTime =$row["fTime"];
       $course->day =$row["day"];
       $course->roomId =$row["roomId"];

	   $courses[$course->sTime][$course->day]=$course;
       if ($course->fTime - $course->sTime === 2){
           $new_time = (($course->sTime) +1).":00:00";
           $courses[$new_time][$course->day]=$course;
       }
	}
	//echo $courses['09:00:00']['Monday']->courseCode;
    $time_intervals=['8am-9am','9am-10am','10am-11am','11am-12pm','12pm-1pm','1pm-2pm','2pm-3pm','3pm-4pm','4pm-5pm','5pm-6pm','6pm-7pm','7pm-8pm'];//index array by default
	$i=0;
    echo "<table class='table table-hover' id='dev-table' style='table-layout:fixed'";
    echo "<thead><tr><th>&nbsp;</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></thead></tr>";
	foreach($courses as $list => $times)
	{
		echo "<tr><td>".$time_intervals[$i++]."</td>"; //i need to iterate all these times
    foreach($times as $days => $value){
		//echo $value->courseCode;
		echo "<td>".$value->courseCode."<br>".$value->courseName."<br>".$value->roomId."</td>";
	}
	echo "</tr>";
	}
	echo "</table>";
}

?>
