<?php
if( empty(getenv("ENVIRONMENT_SET"))) {
    // Default
    // Database
    $serverName_1 = "localhost";
    $userName_1 = "root";
    $userPassword_1 = "";
    $dbName_1 = "enc";
    //echo 'Ok';

} else if(getenv("ENVIRONMENT_SET") == 'PRD') {
    // On production SHOULD NOT CHANGE
    $serverName_1 = "mysql_m";
    $userName_1 = "pm_dev";
    $userPassword_1 = "itbc-development";
    $dbName_1 = "election_2019";


} else {
    // Dev or other
    $serverName_1 = "mysql_m";
    $userName_1 = "pm_dev";
    $userPassword_1 = "itbc-development";
    $dbName_1 = "election_2019";


}

$charSet_1 = "charset=utf8mb4";
$app_version = "1.0.0.2 updated at 28/03/2019";
try {

 $pdo = new PDO("mysql:host=$serverName_1;dbname=$dbName_1;$charSet_1", $userName_1, $userPassword_1);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $pdo->exec("set names utf8mb4");
    //echo "Connected!: ". "<br/>";
//insert
    
} catch (PDOException $e) {
    print "Error!: Cannot connection to database " . $e->getMessage() . "<br/>";
    die();
}
?>