<?php
include ('../DBconnection/dbhConnection.php');

$id = $_POST['id'];

//get row data using id and display in edit record form
$getdata = "SELECT * FROM `PackageData` WHERE Pid='$id'";
$result = $conn->query($getdata);
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);










?>