"use strict";

/*$(document).ready(function(){
	retrieveAllCourses();
	retrieveUserData();
	});*/
//-----------------------------------------------
//Gather and process data

/*function retrieveAllCourses(){
	//alert("hi");
	$.get("../index.php/courses", processAllCourses, "json"); 
	}

function processAllCourses(records){
    if ($("#courseCode").length > 0){ // the course code select is available so we can display all courses
        records.forEach(function(course){
            var htmlStr = "<option value='"+course.courseCode+"'>"+ course.courseCode+"</option>";
            $("#courseCode").append(htmlStr);
        })
    }
}*/
function retrieveAllDepartment(){
	$.get("index.php/departments", processAllDepartments, "json"); 
	}
	
function retrieveAllDepartments(){
	$.get("../index.php/departments", processAllDepartments, "json"); 
	}

function processAllDepartments(records){
    if ($("#departmentId").length > 0){ // the department select is available so we can display all courses
        records.forEach(function(dept){
            var htmlStr = "<option value='"+dept.departmentId+"'>"+dept.departmentId+"</option>";
            $("#departmentId").append(htmlStr);
        })
    }
}


function retrieveAllDeptCourses(departmentid){
	//alert("hi");
	var dept = departmentId.value;
	//alert(dept);
	$.get("../index.php/deptcourses/"+dept, processAllDeptCourses, "json"); 
	}

function processAllDeptCourses(records){
    if ($("#courseCode").length > 0){ // the course code select is available so we can display all courses
        records.forEach(function(course){
            var htmlStr = "<option value='"+course.courseCode+"'>"+ course.courseCode+"</option>";
            $("#courseCode").append(htmlStr);
        })
    }
}

function addCourse(){
	//alert("hi");
	var departmentId = $("#departmentId").val();
	var courseCode = $("#courseCode").val();
	
	var user = {
		"departmentId": departmentId,
		"courseCode": courseCode
	};
	//alert(departmentId);
	$.post("../index.php/addcourse", user, function(res){
		//alert(res.id);
		if(res.id && res.id > 0){
			swal({ 
                title: "Course Saved",
                text: "Successful!",
                type: "success",
				showCancelButton: false,
				confirmButtonText: "Ok",   
				closeOnConfirm: false
            },
                function(){
                    window.location.href = 'timetable.php';
            });
		}
		else{
			swal("Upload Error", "Could not save", "error");
		}
		hideCourseForm();
		clearFields();
	},"json");
	return false;
}

function clearFields(){
	$("#departmentId").val(0);
	$("#courseCode").val(0);
}

function clearCourse(){
	$('#courseCode').find('option:gt(0)').remove();
}

//-----------------------------------------------------------------------------------------------------
// Registration functionality
function register(){
    var fname = $("#fname").val();
    var lname = $("#lname").val();
	var departmentId = $("#departmentId").val();
    var email = $("#email").val();
    var password = $("#password").val();
   
    var regUser = {
        
        "fname" : fname,
        "lname" : lname,
		"departmentId" : departmentId,
        "email" : email,
        "password" : password
    };

    $.post("../index.php/signup", regUser, function(res){
        //alert(res.fname);
		if(res){
            swal({ 
                title: "Registration Complete!",
                text: "Successful!",
                type: "success",
				showCancelButton: false,
				confirmButtonText: "Ok",   
				closeOnConfirm: false
            },
                function(){
                    window.location.href = '../';
            });
        }
        else{
            swal("Incorrect Login","Please try again","error")
        }
    },"json");

    return false;
}

function login(){
    var email = document.forms["logForm"]["email"].value;
    var password = document.forms["logForm"]["password"].value;
    var user = {
        "email" : email,
        "password": password
    };

    //alert(email);
    $.post("index.php/login", user, function(res){
        if(res.loginstatus){
            swal({
				title: "succes",
				text: "Login confirmed",
				type: "success",
				showCancelButton: false,
				confirmButtonText: "Ok",   
				closeOnConfirm: false
        },
		function(){
			window.location.href = 'templates/timetable.php';
		});
    }
	else{
		swal("Incorrect Login", "Try Again", "error")
	}
	},"json");
    return false;
}

function retrieveUserData(){
    $.get("../index.php/timetable", processUserData, "json");
}

function processUserData(records){
    console.log(records);
    createTable(records)
}

function createTable(records){
    var key;
    var sec_id = "#table_secm";
    var htmlStr = $("#table_headingm").html(); //Includes all the table, thead and tbody declarations
	
    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td>" + el['sTime'] + "-" + el['fTime'] + "</td>";
        htmlStr += "<td>" + el['courseName'] + "     " + el['roomId'] + "</td>";
        //htmlStr += "<td>"+ el['roomId'] +"</td>";
        htmlStr +=" </tr>" ;
    });

    htmlStr += "</tbody></table>";
    $(sec_id).html(htmlStr);
}
//-----------------------------------------
//show and hide functions
function AddCourseForm(){
	$('#addCourseForm').show("slow");
}

function hideCourseForm(){
	$('#addCourseForm').hide("slow");
}

function showSearchBar(){
	$('#classroomSearch').show("slow");
}

function hideSearchBar(){
	$('#classroomSearch').hide("slow");
}