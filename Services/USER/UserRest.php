<?php

require_once($_SERVER['DOCUMENT_ROOT'].'wt/DAL/DAL.php');
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
	$username = htmlentities($data['username']);
	$password = htmlentities($data['password']);
	$user = getUserByUsername($username);
	if($user==null) echo json_encode(array("response" => "User is not exsisting"));
	if($password == $user->getPassHash()) echo json_encode(array("response" => "OK", "User" => $user));
	else echo json_encode(array("response" => "Password is not correct"));
}
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>