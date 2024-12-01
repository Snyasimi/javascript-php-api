<?php
require_once('dbconnection.php');
$headers = getallheaders();

    switch($_SERVER['REQUEST_METHOD']){

        case "POST":
            //function to handle post

            $request = file_get_contents('php://input');
            $data = json_decode($request,true);

            //TEST IF USER EXISTS IN DB OR NOT

            $email = trim($data['Email']);
            $password = trim($data['Password']);

            $sql = "SELECT * FROM users WHERE Email='$email' AND Password = '$password' ";

            if($results = mysqli_query($dbconn,$sql)){

                if(mysqli_num_rows($results) == 1){

                    $row =  mysqli_fetch_array($results);

                    $data =array(
                        "Firstname" => $row['Lastname'],
                        "Email" => $row['Email'],
                        "Password" => $row['Password']
                    );


                    http_response_code(200);
                    $response = array(
                        'message' => 'User Logged in',
                        'data' => json_encode($data,true)
                    );

                    echo(json_encode($response));
                }else{

                    http_response_code(401);
                    $response = array(
                        'message' => 'Credentials do not match our records',
                        'data' => NULL
                    );
                    echo(json_encode($response));
                    break;
                }


            }else{

                http_response_code(500);

                    $response = array(
                        'message' => 'Error fetching data..',
                        'data' => NULL
                    );
                
                    echo(json_encode($response));
            }


            break;
        case "GET":
            //handle get
            //get headers 
            $HEADERS = getallheaders();
            header("Content-type:application/json");
            header("server:NULL");
            if(isset($HEADERS['content-type']) == "application/json"){

                $data = mysqli_query($dbconn,"SELECT * FROM users;");
                $response = array(
                    'message' => 'Success',
                    'data' => json_encode($data),
                );

                echo json_encode($response);
                break;
            }
                echo"
                
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>Error</h1>
                    <hr>
                    <p>Only accepts application/json</p>   
                </body>
                </html> 

                ";
            
            
            break;
        default:

            if($_SERVER['HTTP_CONTENT_TYPE'] == "application.json"){
                //set status code to not allowed and return error in the message
                http_response_code(405);
                $response = array(
                    'message' => 'Err',
                    'data' => "No data for you :) "
                );

                echo(json_encode($response));

            }else{
                http_response_code(405);
                echo" <!DOCTYPE html>
                <html>
                <head>
                    <title>Document</title>
                </head>
                <body>
                    <h1>Error</h1>
                    <hr>
                    <p>Method not allowed</p>   
                </body>
                </html> ";
            }
            break;

    }


?>