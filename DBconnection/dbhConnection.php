<?php


$servername = '127.0.0.1';
$username = 'root';
$password = 'depedcsjdmteacherdb';
$name = 'dcp_monitoring';

$conn = mysqli_connect($servername, $username, $password, $name);
if(!$conn){
    die('Connection error' . mysqli_connect_error());
}





?>