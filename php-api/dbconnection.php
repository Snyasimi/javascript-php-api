<?php

$host="localhost";
$dbname="php-api";
$user="root";
$password ="";

if(!$dbconn = mysqli_connect($host,$user,$password,$dbname)){
    exit(1);    
}


?>