<?php

require_once('DAL.php');
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
	$user = getAllUsers();
	if($user==null) echo json_encode(array("response" => "There are no exsisting users"));
	echo json_encode(array("response" => "OK", "User" => $user));
}
function rest_post($request, $data) {
    $str_json = file_get_contents('php://input');
    $user = json_decode($str_json);
    //var_dump($user);
    //echo $user;
    addUser($user);
    echo json_encode(array("response" => "OK"));
}
function rest_delete($request, $data) {
    $id = $data['id'];
    deleteUser($id);
    echo json_encode(array("response" => "OK"));
}
function rest_put($request, $data) {
    //$str_json = file_get_contents('php://input');
    //var_dump(key($data));
    $user = json_decode(key($data));
    //var_dump($str_json)
    //var_dump($user);
    updateUser($user);
    echo json_encode(array("response" => "OK"));
}
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
        zag(); $data = $_GET; rest_delete($request, $data); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>