<?php
if (isset($_POST['_id'])) {
    //echo $pdo;
    require '../../00_config/connect.php';//db connect
 $TABLE_NAME = "00_module";
 try {
    $module_id = $_POST['_id'];
    $datalist =[
        "module_id"        =>   $module_id
      ];
      $sql = "UPDATE $TABLE_NAME 
              SET module_trash = 1
              WHERE module_id = :module_id";
    $statement = $pdo->prepare($sql);
    $statement->execute($datalist);
    echo 'success';
  } catch(PDOException $error) {
    echo 'error';
  }
  $pdo = null;
}
?>