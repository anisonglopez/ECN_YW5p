<?php
if (isset($_POST['_id'])) {
    //echo $pdo;
    require '../../00_config/connect.php';//db connect
 $TABLE_NAME = "00_department";
 try {
    $dep_id = $_POST['_id'];
    $datalist =[
        "dep_id"        =>   $dep_id
      ];
      $sql = "UPDATE $TABLE_NAME 
              SET dep_trash = 1
              WHERE dep_id = :dep_id";
    $statement = $pdo->prepare($sql);
    $statement->execute($datalist);
    echo 'success';
  } catch(PDOException $error) {
    echo 'error';
    //   echo  "Error Cannot Delete" . $sql . "<br>" . $error->getMessage();
    //   $alert_class = "alert-danger ";
    //   /echo "error";
  }
  $pdo = null;
}
?>