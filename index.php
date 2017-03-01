<?php
require("vendor/autoload.php");
include 'lib.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;
use Slim\Views\PhpRenderer as PhpRenderer;
use Slim\Views\Twig as Twig;

 
$configuration = [
		'settings' => [
				'displayErrorDetails' => true,
		],
		'renderer' => new Twig("./templates")
];

$container = new Container($configuration);
$app = new App($container);

$app->get('/', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/login.php");
});

$app->get('/templates/signup.phtml', function (Request $request, Response $response){
	return $this->renderer->render($response, "/signup.phtml");
});

$app->get('/home', function (Request $request, Response $response){
	return $this->renderer->render($response, "/timetable.phtml");
});

$app->post("/signup", function(Request $request, Response $response){
	$post = $request->getParsedBody();
	$fname = $post['fname'];
	$lname = $post['lname'];
	$departmentId = $post['departmentId'];
	$email = $post['email'];
	$password = $post['password'];
	
	$res = saveUser($fname, $lname, $departmentId, $email, $password);

	if ($res){
		$response = $response->withStatus(201);
		$response = $response->withJson(array( "userId" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
});

$app->post("/login", function(Request $request, Response $response)use ($app){
	//echo "hello world";
	$post = $request->getParsedBody();
	$email = $post['email'];
	$password = $post['password'];
	$res = checkLogin($email, $password);
	if ($res){
		$response = $response->withStatus(201);
		$response = $response->withJson(array("loginstatus"=> true));
	} else {
		$response = $response->withJson(400);
	}
	return $response;
});

$app->run();
?>