"use strict";
console.log("hello I'm connected to the world");

// Registration functionality
function register(){
    var firstname = $("#Fname").val();
    var lastname = $("#Lname").val();
	var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();

	
    var user = {
        
        "firstname" : Fname,
        "lastname" : Lname,
		"username" : username,
        "email" : email,
        "password" : password
    };

    $.post("../index.php/signup", user, function(res){
        if(res){
            console.log(res);
            swal({ 
                title: "Registration Complete!",
                text: "Successfull :)!",
                type: "success" 
            },
                function(){
                    window.location.href = 'signup.phtml';
            });
        }
        else{
            swal("Incorrect Login","Please try again","error")
        }
    },"json");

    return false;
}