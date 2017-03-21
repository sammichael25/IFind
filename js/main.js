"use strict";

$(document).ready(function(){
	$('#saveT').click(function(){
		window.location.href = 'pdf.php';
		});
	
	$('a[rel=popover]').popover({
		html: true,
		//trigger: 'click',
		placement: 'bottom',
		content: function(){return '<img src="'+$(this).data('img') + '" />';}
		});

	retrieveAllRooms();
	});
//-----------------------------------------------
//Gather and process data

function retrieveAllRooms(){
	//alert("hi");
	$.get("../index.php/rooms", processAllRooms, "json"); 
	}

function processAllRooms(records){
        records.forEach(function(room){
            var htmlStr = "<option value='"+room.roomId+"'>"+ room.roomId+"</option>";
            $("#rooms").append(htmlStr);
        })
    }
	
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

function getUserCourses(){
	$.get("../index.php/usercourses", processUserCourses, "json");
}

function processUserCourses(records){
	if ($("#courseCde").length > 0){ // the course code select is available so we can display all courses
        records.forEach(function(course){
            var htmlStr = "<option value='"+course.courseCode+"'>"+ course.courseCode+"</option>";
            $("#courseCde").append(htmlStr);
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

function deleteCourse(){
	var courseCde = $("#courseCde").val();
	    swal({
        title: "Do You Want To Delete?",
        text: "This action is permanent!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, Go Ahead.',
        cancelButtonText: "No, cancel it!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
		if (isConfirm){
			$.get("../index.php/delcourse/"+courseCde, function(res){
			swal("Deleted!", "Course has been deleted.", "success");
			window.location.href = 'timetable.php';
			},"json");
		} else {
		swal("Cancelled", "Course not deleted", "error");
		}
});
hideDeleteForm();
clearDeleteForm();
}

function clearFields(){
	$("#departmentId").val(0);
	$("#courseCode").val(0);
}

function clearCourse(){
	$('#courseCode').find('option:gt(0)').remove();
}

function clearDeleteForm(){
	$('#courseCde').find('option:gt(0)').remove();
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
				title: "success",
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

function search(){
	var roomID = $("#roomID").val();
	var room = roomID.toUpperCase();
	//alert(roomID);
	$.get("../index.php/roomExist/"+room,function(res){
		if(res.exist){
	window.location.href = '../templates/classmap.php?roomID='+room;
		}
		else{
			swal("Room Not Found!", "Please Check Your Spelling", "error");
		}
	});
}


//-----------------------------------------
//show and hide functions
function AddCourseForm(){
	$('#addCourseForm').show("slow");
}

function hideCourseForm(){
	$('#addCourseForm').hide("slow");
}

function showDeleteForm(){
	$('#deleteCourseForm').show("slow");
}

function hideDeleteForm(){
	$('#deleteCourseForm').hide("slow");
}

function showSearchBar(){
	$('#classroomSearch').show("slow");
}

function hideSearchBar(){
	$('#classroomSearch').hide("slow");
}