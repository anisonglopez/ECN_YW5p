<?php
$ServerName =  $_SERVER['HTTP_HOST'];
if($ServerName == 'localhost:82'){
    //Enviroment Dev
    $serverName_1 = "localhost";
    $userName_1 = "root";
    $userPassword_1 = "";
    $dbName_1 = "enc";
}else if ($ServerName == 'ecn.cheetahsolution'){
       //Enviroment PRD
    $serverName_1 = "localhost";
    $userName_1 = "cheetahs_ecnuser";
    $userPassword_1 = "P@ssw0rdEcn@";
    $dbName_1 = "cheetahs_ecn";
}else{
    echo 'Error ..! Please Contact Support';
    die();
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