<?php
 require '../00_config/connect.php';
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
$TABLE_NAME = "30_ecn";

// Setup WHERE cause
// DB table to use
$condit  = "";
if (isset($_GET['part_no_search'])) {
    $part_no_search = $_GET['part_no_search'];
    $condit = "AND (part_no_new LIKE '%$part_no_search%' OR part_no_old LIKE '%$part_no_search%') ";
}
if (isset($_GET['ecn_status'])) {
    $ecn_status = $_GET['ecn_status'];
    $condit = "AND (ecn_status LIKE '%$ecn_status%') ";
}

$table =<<<EOT
    (
        SELECT * FROM 30_ecn WHERE ecn_trash = 0  $condit
    ) temp
EOT;
// Table's primary key
$primaryKey = 'ecn_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ecn_id',  'dt' => 0 , 'formatter' => function( $d, $row ) {
        return '<sapn><a href="ecn_change.php?id='.base64_encode($d).'" class="btn btn-outline-warning btn-sm"><span class="label label-inverse"><i class="fas fa-edit fa-fw"></i> </span></a>
        <button id="'.$d.'"  class="btn btn-outline-danger btn-sm btndelete" ><span class="fas fa-trash fa-fw"></span></button>
        <button id="'.$d.'"  class="btn btn-outline-info btn-sm viewfile" ><span class="fas fa-angle-down fa-fw"></span></button></span>
        ' ;},
    'field' => 'id' ),
    array( 'db' => 'ecn_created_date',  'dt' => 1 , 'formatter' => function( $d, $row ) {
        return '<label">'.date("d/m/Y", strtotime($d)).' </label>';},
    'field' => 'id' ),
    array( 'db' => 'ecn_no',  'dt' => 2 ),
    array( 'db' => 'buddle_code',  'dt' => 3 ),
    array( 'db' => 'part_no_old',  'dt' => 4),
    array( 'db' => 'part_no_new',  'dt' => 5),
    array( 'db' => 'part_name_new',  'dt' => 6),
    array( 'db' => 'reason',  'dt' => 7),
    array( 'db' => 'wh_m',  'dt' => 8),
    array( 'db' => 'sn_break',  'dt' => 9),
    // array( 'db' => 'eff',  'dt' => 10),
         array( 'db' => 'eff',  'dt' => 10 , 'formatter' => function( $d, $row ) {
        return $d == 'Effective' ? '<span class="badge badge-pill badge-dark">'.$d.'</span>'  : 
        '<span class="badge badge-pill badge-light">'.$d.'</span>'  ;
    },
    'field' => 'id' ),
         array( 'db' => 'eff_date',  'dt' => 11 , 'formatter' => function( $d, $row ) {
             $eff_date = date("d/m/Y", strtotime($d));
             $eff_date = $eff_date=="01/01/1970" ? "" : $eff_date;
        return '<label">'.$eff_date.' </label>';},
    'field' => 'id' ),
    // array( 'db' => 'ecn_status',  'dt' => 12),
    array( 'db' => 'ecn_status',  'dt' => 12 , 'formatter' => function( $d, $row ) {
        if($d == 'Closed' ){
        $data =  '<span class="badge badge-pill badge-success">'.$d.'</span>' ;
        }
       else if($d == 'Set_Meeting' ){
        $data =  '<span class="badge badge-pill badge-primary">'.$d.'</span>' ;
       }else if($d == 'Pending' ){
        $data =  '<span class="badge badge-pill badge-warning">'.$d.'</span>' ;
       }
       else{
        $data =  '<span class="badge badge-pill badge-danger">'.$d.'</span>';
       }
        return '<label">'.$data.' </label>';},
    'field' => 'id' ),
    //  array( 'db' => 'distribute_date',  'dt' => 11 , 'formatter' => function( $d, $row ) {
    //     return '<label">'.date("d/m/Y", strtotime($d)).' </label>';},
    // 'field' => 'id' ),
       
);

// SQL server connection information
// $sql_details = array(
//     'user' => 'root',
//     'pass' => '',
//     'db'   => 'election_db1_test',
//     'host' => 'localhost'
// );
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../public_class/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $pdo, $table, $primaryKey, $columns )
);