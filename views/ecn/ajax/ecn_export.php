
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
    $stmt = $pdo->query("SELECT * FROM $DB_TBLName");
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
    echo "<h1>ECN DATABASE</h1>";
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
        elseif ($row[$j] != "")
            //$schema_insert .= "$row[$j]".$sep,'UTF-8';
            $schema_insert .= "<td>"."$row[$j]".$sep."</td>";
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print trim($schema_insert);
    print "</tr><tr>";
}

?>
</tr>

</table>
</body>