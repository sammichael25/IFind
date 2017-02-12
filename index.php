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
	
	$Fname = $post['Fname'];
	$Lname = $post['Lname'];
	$username = $post['username'];
	$email = $post['email'];
	$password = $post['password'];
	
	$res = saveUser($Fname, $Lname, $username, $email, $password);

	if ($res){
		$response = $response->withStatus(201);
		$response = $response->withJson(array( "id" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
});

$app->run();
?>