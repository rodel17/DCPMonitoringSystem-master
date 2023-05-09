<?php
// DB table to use
$table = 'PackageData';
 
// Table's primary key
$primaryKey = 'Pid';
 
    $columns = array(
        array( 'db' => 'Pid', 'dt' => 0 ),
        array( 'db' => 'Package',  'dt' => 1 ),
        array( 'db' => 'Year',   'dt' => 2 ),
        array( 'db' => 'Warranty',     'dt' => 3 ),
        array( 'db' => 'Device',     'dt' => 4 ),
        array( 'db' => 'Serial',     'dt' => 5 ),
        array( 'db' => 'Brand',     'dt' => 6 ),
        array( 'db' => 'Specification',     'dt' => 7 ),
        array( 'db' => 'UnitCost',     'dt' => 8 ),
        array( 'db' => 'State',     'dt' => 9 ),
        array( 'db' => 'AccountableOfficer',     'dt' => 10 ),
    );

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'depedcsjdmteacherdb',
    'db'   => 'dcp_monitoring',
    'host' => '127.0.0.1'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);

require( 'ssp.class.php' );

    // $whereClause = "teacher_status = 'active' AND school = '$schl'";
    // echo json_encode(
    //     SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $whereClause)
    // );
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
    );