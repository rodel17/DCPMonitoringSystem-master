<?php

include ('../DBconnection/dbhConnection.php');

$id = $_POST['id'];

$sql = "DELETE FROM PackageData WHERE Pid = '$id'";
mysqli_query($conn, $sql);

?>