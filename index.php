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

$app->get('/signup', function (Request $request, Response $response){
	return $this->renderer->render($response, "/signup.phtml");
});

$app->get('/home', function (Request $request, Response $response){
	return $this->renderer->render($response, "/timetable.php");
});

$app->get("/courses", function(Request $request, Response $response){
	$courses = getAllCourses();
	
	$response = $response->withJson($courses);
	return $response;
});

$app->get("/deptcourses/{id}", function(Request $request, Response $response){
	$val = $request->getAttribute('id');
	$courses = getAllDeptCourses($val);
	
	$response = $response->withJson($courses);
	return $response;
});

$app->get("/usercourses", function(Request $request, Response $response){
	//$val = $request->getAttribute('id');
	$courses = getAllUserCourses();
	
	$response = $response->withJson($courses);
	return $response;
});

$app->get("/departments", function(Request $request, Response $response){
	$departments = getAllDepartments();
	
	$response = $response->withJson($departments);
	return $response;
});

$app->get("/timetable", function(Request $request, Response $response){
	$timetable = getUserTable();
	
	$response = $response->withJson($timetable);
	return $response;
});

$app->get("/delcourse/{id}", function(Request $request, Response $response){
	$data = $request->getAttribute('id');
	$res = deleteCourse($data);
	
	if($res){
		$response = $response->withStatus(201);
		$response = $response->withJson(array("deleted" => $res));
	}else{
		$response = $response->withJson(false);
	}
	return $response;
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

$app->post("/addcourse", function(Request $request, Response $response)use ($app){
	$post = $request->getParsedBody();
	$departmentId = $post['departmentId'];
	$courseCode = $post['courseCode'];
	$res = saveCourse($courseCode);
	if ($res > 0){
		$response = $response->withStatus(201);
		$response = $response->withJson(array("id"=> $res));
	} else {
		$response = $response->withJson(400);
	}
	return $response;
});

$app->run();
?>