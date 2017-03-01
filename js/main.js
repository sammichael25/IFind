"use strict";
console.log("hello I'm connected to the world");

$(document).ready(function(){
	console.log("All Elements in the Page was successfully loaded, we can begin our application logic");
});

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

    alert(email);
    $.post("../index.php/login", user, function(res){
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
			window.location.href = 'timetable.phtml';
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