"use strict";

$(document).ready(function(){
	retrieveAllCourses();
	});
//-----------------------------------------------
//Gather and process data

function retrieveAllCourses(){
	//alert("hi");
	$.get("../index.php/courses", processAllCourses, "json"); 
	}

function processAllCourses(records){
    if ($("#courseCode").length > 0){ // the course code select is available so we can display all courses
        records.forEach(function(course){
            var htmlStr = "<option value='"+course.courseCode+"'>"+course.courseCode+"</option>";
            $("#courseCode").append(htmlStr);
        })
    }
}

function addCourse(){
	alert("hi");
	var courseCode = $("#courseCode").val();
	
	var user = {
		"courseCode": courseCode
	};
	alert(courseCode);
	$.post("index.php/addcourse", user, function(res){
		alert(res.id);
		if(res.id && res.id > 0)swal("Saved", "Course Saved", "success");
		else swal("Upload Error", "Could not save", "error");
		hideCourseForm();
		clearFields();
	},"json");
	return false;
}

function clearFields(){
	$("#courseCode").val("");
}

//-----------------------------------------------------------------------------------------------------
// Registration functionality
function register(){
    var firstname = $("#fname").val();
    var lastname = $("#lname").val();
	var departmentId = $("#departmentId").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
   

	
    var regUser = {
        
        "firstname" : fname,
        "lastname" : lname,
		"department" : departmentId,
        "email" : email,
        "password" : password
    };

    $.post("index.php/signup", regUser, function(res){
        if(res){
            console.log(res);
            swal({ 
                title: "Registration Complete!",
                text: "Successful :)!",
                type: "success",
				showCancelButton: false,
				confirmButtonText: "Ok",   
				closeOnConfirm: false
            },
                function(){
                    window.location.href = 'templates/login.php';
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
    $.get("index.php/products", processUserData, "json");
}

function processUserData(records){
    console.log(records);
    createTable(records)
}

function createTable(records){
    var key;
    var sec_id = "#table_sect";
    var htmlStr = $("#table_headingt").html(); //Includes all the table, thead and tbody declarations

    records.forEach(function(el){
        htmlStr += "<tr>";
        htmlStr += "<td>" + el['sTime'] + el['fTime'] +"</td>";
        htmlStr += "<td>" + el['f'] + "</td>";
        htmlStr += "<td>"+ el['country'] +"</td>";
        htmlStr += "<td><button class='btn btn-primary' onclick=\"display("+el.id+")\"><i class='fa fa-eye' aria-hidden='true'></i></button> ";
        htmlStr += "<button class='btn btn-success' onclick=\"addCart("+el.id+")\"><i class='fa fa-cart-plus' aria-hidden='true'></i></button> ";
        htmlStr += "<button class='btn btn-danger' onclick=\"display("+el.id+")\"><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
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