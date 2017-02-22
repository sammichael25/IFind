<?php
require("vendor/autoload.php");

include 'lib.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
 
$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response) {
 
	echo "hello World";
});

$app->post("/signup", function(Request $request, Response $response){
	$post = $request->getParsedBody();
	
	$fname = $post['Fname'];
	$lname = $post['Lname'];
	$email = $post['email'];
	$password = $post['password'];
	$deptId = $post['department'];
	
	$res = saveUser($fname, $lname, $email, $password, $deptId);

	if ($res){
		$response = $response->withStatus(201);
		$response = $response->withJson(array( "userId" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
});

$app->run();
?>