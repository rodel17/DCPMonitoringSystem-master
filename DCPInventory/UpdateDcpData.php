<?php
include ('../DBConnection/dbhConnection.php');

$package = $_POST['editpackage'];
$year = $_POST['edityear'];
$device = $_POST['editdevice'];
$serial = $_POST['editserial'];
$brand = $_POST['editbrand'];
$specification = $_POST['editspecification'];
$unitcost = $_POST['editunitcost'];
$condition = $_POST['editcondition'];
$ao = $_POST['editao'];
$pid = $_POST['pid'];
$warranty = $_POST['warranty'];

$update = "UPDATE `PackageData` SET `Package`='$package',`Year`='$year',`Warranty`='$warranty',`Device`='$device',`Serial`='$serial',`Brand`='$brand',`Specification`='$specification',`UnitCost`='$unitcost',`AccountableOfficer`='$ao',`State`='$condition' WHERE Pid = '$pid'";
$stmt = mysqli_prepare($conn, $update);
mysqli_stmt_execute($stmt);



?>