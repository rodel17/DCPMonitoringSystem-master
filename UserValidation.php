<?php

session_start();
include ('DBconnection/dbhConnection.php');
$username = $_POST['username'];
$userpass = $_POST['userpass'];

$getdata = "SELECT * FROM `users` WHERE username = '$username' and user_pass = '$userpass'";
$result = $conn->query($getdata);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $type = $row['type'];
        $_SESSION['school'] = $row['user_school'];
        $_SESSION['district'] = $row['user_district'];
        $_SESSION['useremail'] = $row['user_email'];

        if($type == 'admin1'){
            $_SESSION['username']  = $row['username'];
            header('Location:  DCPInventory/DcpManage');
        }else if($type == 'admin2'){
            $_SESSION['username']  = $row['username'];
            header('Location: admin');
        }else{
          
        }
    }     
}else{
    $_SESSION['validate'] = 'error';
    header('Location: index.php');
    echo 'error';
    }   
?>