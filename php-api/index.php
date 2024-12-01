<?php


$server_name = $_SERVER['SERVER_NAME'];
$server_ip = $_SERVER['SERVER_ADDR'];
$client_ip = $_SERVER['REMOTE_ADDR'];
//echo"Server: $server_name<br>SERVER_IP: $server_ip<br>CLIENT_IP: $client_ip";

//encoding 


/*Three paths, login, sign_up, show resources
*
*/






if($_SERVER['REQUEST_METHOD'] == "POST"){
    //we need to process login data

    $body = file_get_contents('php://input');
    $json_body = json_decode($body,true);

    $data = array(
        'email' => $json_body['email'],
        'password' => $json_body['password']
    ); 
    $response = json_encode($data); 
    echo $response;

}
else{

    $obj1 = ["leg"=>"21"];

    $obj2 = array("arm"=>22,"leg"=>43);

    $jsonbj1 = json_encode($obj1);

    $jsonbj2 = json_encode($obj2);

    http_response_code(201);

    //IF THE REQUEST IS POST DECDE AND RETURN
    echo $jsonbj1;
}



?>
