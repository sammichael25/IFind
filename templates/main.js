"use strict";
console.log("hello I'm connected to the world");

login();
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

    $.post("../index.php/signup", regUser, function(res){
        if(res){
            console.log(res);
            swal({ 
                title: "Registration Complete!",
                text: "Successful :)!",
                type: "success" 
            },
                function(){
                    window.location.href = 'login.php';
            });
        }
        else{
            swal("Incorrect Login","Please try again","error")
        }
    },"json");

    return false;
}

function login(){
    console.log("Hi");
    var email = $("#email").val();
    var password = $("#password").val();
    console.log(email + " " + pass);
    var user = {
        "email" : email,
        "password": password
    }

    console.log(user);
    $.post("../index.php/login", user, function(res){
        console.log(res);
        if(res.loginstatus){
            swal({ 
                title: "Welcome",
                text: "You have logged in successfully",
                type: "success" 
            },
                function(){
                    window.location.href = '../timetable.html';
            });
            //window.location.href="homepage.php";
            //return false;
        }
        else{
            swal("Incorrect Login","Please try again","error")
            //return false;
        }
    },"json");
    console.log("Logged In");
    return true;
}

function test(){
	console.log ("hello world");
}