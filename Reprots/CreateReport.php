<?php


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate Reports object
include_once '../objects/Reports.php';
 
$database = new Database();
$db = $database->getConnection();
$Reports = new Reports($db);
 
// get posted data
//$data = json_decode(file_get_contents("php://input"));
$json = file_get_contents('php://input');
$data = json_decode($json);


// set Reports property values
$Reports->uid = $data->uid;
$Reports->sid = $data->sid;
$Reports->score = $data->score;
$Reports->comments = $data->comments
$Reports->songcategory = $data->songcategory
$Reports->created = date('Y-m-d H:i:s');

if($Reports->create()){
    echo '{';
        echo '"message": "Reports was created."';
    echo '}';
}
 
// if unable to create the Reports, tell the Reports
else{
    echo '{';
        echo '"message": "Unable to create Reports."';
    echo '}';
}
?>