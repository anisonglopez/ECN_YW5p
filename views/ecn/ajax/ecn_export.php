<?php

// header('Content-Type: text/html; charset=utf-8');
 
//Connect DB
require '../../00_config/connect.php';
 /*******EDIT LINES 3-8*******/
$DB_TBLName = '30_ecn'; //MySQL Table Name   
$filename = 'ecn_database';     //File Name
date_default_timezone_set("Asia/Bangkok");
$date_now = date('Y-m-d H_i_s');
//header info for browser
header("Content-Type: application/vnd.ms-excel");    
header("Content-Disposition: attachment; filename=$filename $date_now.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
try{
    $search_date_start = $_GET['cre_date_start'];
    $search_date_end = $_GET['cre_date_end'];
    echo $search_date_end ;
    $stmt = $pdo->query("SELECT ecn_no, created_date, buddle_code, 
    minor, part_no_old, part_name_old, part_no_new, part_name_new, 
    ac, model_concern, reason, wh_m, sn_break_condit, sn_break, eff, eff_date, 
    ecn_status, dwg, stock_sup, cost_sup, qa_audit, sp_req, buyer, 
    sup, first_po, first_deliver, remark FROM $DB_TBLName WHERE 
    ecn_trash = 0 AND created_date  BETWEEN '$search_date_start' and '$search_date_end' 
    ");
    // while ($row = $stmt->fetch()) {
    //     //print("name = $stmt");
    // }
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "\r\n";
}
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<?php

?>
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<?php
    echo '<h1>ECN Database</h1><h2> ในช่วงวันที่'.date('d/m/Y',strtotime($search_date_start)).' - '.date('d/m/Y',strtotime($search_date_end)).'</h2>';
?>
<table  x:str BORDER="1">

<tr>
    <?php
for ($i = 0; $i < $stmt->columnCount(); $i++) {
    $col = $stmt->getColumnMeta($i);
    $columns[] = $col['name'];
    echo "<th>".$columns[$i]. "</th>";
   //echo mb_convert_encoding("ภาษาไทย", 'UTF-8');
}
    ?>
</tr>
<tr>
<?php
$sep = "\t"; //tabbed character
while ($row = $stmt->fetch()) {
    $schema_insert = "";
    for ($j = 0; $j < $stmt->columnCount(); $j++) {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != ""){
            //$schema_insert .= "$row[$j]".$sep,'UTF-8';
            if($j == 1){
                $schema_insert .= "<td>".date('d/m/Y' , strtotime($row[$j])).$sep."</td>";
            }else if($j ==15){
                $schema_insert .= "<td>".date('d/m/Y' , strtotime($row[$j])).$sep."</td>";
            }else if($j ==25){
                $schema_insert .= "<td>".date('d/m/Y' , strtotime($row[$j])).$sep."</td>";
            }
            else{
                $schema_insert .= "<td>".$row[$j].$sep."</td>";
            }         
        }
        else{
            $schema_insert .= "<td>".$row[$j].$sep."</td>";
        }
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
   // $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print trim(nl2br($schema_insert));
    print "</tr><tr>";
}
?>
</tr>

</table>
</body>