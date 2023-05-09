<?php
include ('../DBConnection/dbhConnection.php');

$school = $_POST['school'];
$district = $_POST['district'];
$address = $_POST['address'];
$cellphone = $_POST['cellphone'];
$contactperson = $_POST['contactperson'];
$reportwarranty = $_POST['reportwarranty'];
$dcppackage = $_POST['dcppackage'];
$devicemodel = $_POST['devicemodel'];
$serialno = $_POST['serialno'];
$deviceissue = $_POST['deviceissue'];
$ictreport = $_POST['ictreport'];


$sql ="INSERT INTO `Reports`(`School`,`District`,`Address`,`Cellphone_no`,`ContactPerson`,`Warranty`,`DcpPackage`,`Device_Model`,`SerialNo`,`DeviceIssue`,`IctReport`) 
VALUES('$school','$district','$address','$cellphone','$contactperson','$reportwarranty','$dcppackage','$devicemodel','$serialno','$deviceissue','$ictreport')";
$conn->query($sql);









?>