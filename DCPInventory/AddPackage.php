<?php
include ('../DBConnection/dbhConnection.php');

$package = $_POST['package'];
$year = $_POST['year'];
$warranty = $_POST['warranty'];
$device = $_POST['device'];
$serial = $_POST['serial'];
$brand = $_POST['brand'];
$specification = $_POST['specification'];
$unitcost = $_POST['unitcost'];
$condition = $_POST['condition'];
$ao = $_POST['ao'];


$sql ="INSERT INTO `PackageData`(`Package`,`Year`,`Warranty`,`Device`,`Serial`,`Brand`,`Specification`,`UnitCost`,`AccountableOfficer`,`State`) 
VALUES('$package','$year','$warranty','$device','$serial','$brand','$specification','$unitcost','$ao','$condition')";
$conn->query($sql);



?>